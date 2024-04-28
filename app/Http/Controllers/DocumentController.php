<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\lib\Docs;
use App\lib\Notif;
use Illuminate\Support\Facades\Storage;
use \Crypt;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $name = $request->input('title');
    $event_id = $request->input('event');
    $id = Auth::id();
    $current_timestamp = Carbon::now();
    $original= $request->file('doc')->getClientOriginalName();
    $description=$request->input('description');
    if ($request->has('doc')) {
echo("<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width', initial-scale=1>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #E44D3A;
  border-right: 16px solid #ffffff;
  border-bottom: 16px solid #E44D3A;
  border-left: 16px solid #ffffff;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
padding:20px;
}
.pos{
position:fixed;
left: 45%;
top: 20%;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<div class='pos'>

<div class='loader'></div>
<h2>Wait While processing</h2>

</div>
</body>
</html>");
        
    $path=  $request->file('doc')->store("link/");
    $query=Docs::insert($name,$id,$path,$current_timestamp,$original,$description,$event_id );
     $notifs=Notif::select_Notif_User_Docs(Auth::id(),$query);
           Notif::store($notifs);
         return redirect('/profile');
    }else{
           return redirect('/profile');
    }
    
    }
    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloader(Request $request)
    {
        try {
        $fileID = $request->fileID;
        $fileID= Crypt::decryptString($fileID);
        $cord=Docs::select_file($fileID);
        //var_dump($cord);
        try{
        Docs::InserDownlaodedSuc($fileID,Auth::id(),Carbon::now());
        return Storage::download($cord->path, $cord->original_name); 
        }catch(\Illuminate\Database\QueryException $ex){
        return Storage::download($cord->path, $cord->original_name); 

        }

        
      } catch (DecryptException $e) {
    
       }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
     Docs::addComment(Auth::id(),$request->fileID,Carbon::now(),$request->data);
     return response( $request->data, 200)->header('Content-Type', 'text/plain'); 

    }
    
    public function getLastCom(Request $request){
    $com= Docs::getLast($request->fileID);
     return response( (array) $com, 200)->header('Content-Type', 'text/plain'); 
        
    }
    
    public function like(Request $request)
    {
      Docs::addLike(Auth::id(),$request->fileID,Carbon::now());
     return response("active", 200)->header('Content-Type', 'text/plain'); 

    }
    
    public function Dislike(Request $request)
    {
      Docs::removeLike(Auth::id(),$request->fileID,Carbon::now());
     return response("active", 200)->header('Content-Type', 'text/plain'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
        $id = Crypt::decryptString($request->docID) ;
        $docs=Docs::select_Doc($id);
        $data['pub']=$docs;
        Notif::setStatus($id,Auth::id());
        try{
        if(Docs::test_my_doc(Auth::id(),$id)!=1){
         Docs::addView(Auth::id(),$id,Carbon::now());
        }
        }catch(\Illuminate\Database\QueryException $ex){
         return view('profile_propreties.doc')->with('data', $data); 

        }
        return view('profile_propreties.doc')->with('data', $data); 
        }catch(\RuntimeException $e){
        return view('profile_propreties.not')->with('mess',"Document not found");
        }


        
    }
}
