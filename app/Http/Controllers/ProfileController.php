<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\lib\Event;
use App\lib\Docs;
use App\lib\Users;
use App\lib\Profile;
use \Crypt;

class ProfileController extends Controller
{
  
    
    
    
   
public function send(Request $request)
    {
    $id = Auth::id();
    if ($request->has('cover')) {
    $path=  $request->file('cover')->store("link/");
     $data=array();
     $data['val']=Profile::updateCover($path,$id);
     $data['path']=$path;
     
     return response($data , 200);    
    }
        
    }
    
public function sendPhoto(Request $request)
    {
    $id = Auth::id();
    if ($request->has('ProfilePhoto')) {
     $path=  $request->file('ProfilePhoto')->store("link/");
     $data=array();
     $data['val']=Profile::updatePhoto($path,$id);
     $data['path']=$path;
     
     return response($data , 200);    
    }
        
    }
    
    
    
    
    public function index(Request $request)
    {
        $proprety="";
         
      if(isset($request->ProfileID)){
            try{
                 $id= Crypt::decryptString($request->ProfileID);
               } catch (\RuntimeException $e) {
                   return view('profile_propreties.not')->with('mess',"User Not Found");
               }            
            if($id==Auth::id()){
              return redirect('/profile');
            }else{
                $proprety="hidden";
                
            }
           // return view('profile_propreties.not')->with('mess',"You're Not Following This User ");
        }else{
          $id = Auth::id();
        }
       $data = array();
        
        
        if(Users::User_exist($id)){
       $events = Event::select_Event_User($id);
       $data['events']=$events;
        if($proprety=="hidden"){
                $docs=Docs::select_Followed_Event_Docs($id,Auth::id());
                $data['pub']=$docs;
               // var_dump($docs->coms);
         
            }else{
                $docs=Docs::select_Docs_User($id);
                $data['pub']=$docs;
               // var_dump($docs[0]->coms[0]);
        }

      $user_info=Users::User_info($id);
      $data['user_info']=$user_info;
      $data['hide']=$proprety;
      
      return view('profile_propreties.UserProfile')->with('data', $data);
            
        }else{
         return view('profile_propreties.not')->with('mess',"User Not Found");
            
        }

    }
    
    public function home(Request $request){
       if(Auth::id()==null){
        return view('home');
       }

       $id = Auth::id();
       $data = array();
         
        $docs=Docs::select_Followed_Event_Docs_home($id);
        $data['pub']=$docs;
        
        $user_info=Users::User_info($id);
        $data['user_info']=$user_info;
        
        $events = Event::select_Event_User($id);
        $data['events']=$events;
        
        $event_trend = Event::showAll_Events();
        $data['trends']=$event_trend;
        //S  var_dump($data['trends']);
        
        $usr=Users::Users_Except_One_Five($id);
        $data['users']=$usr;
        return view('profile_propreties.home')->with('data', $data);


    }
    
    public function logouut(){
        Auth::logout();
        return redirect('/login');
        
    }

    
    
    
    
    
  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $id = Auth::id();
        $data = array();
        

        $users=Users::Users_Except_One($id);
        $data['users']=$users;
        return view('profile_propreties.profiles')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
