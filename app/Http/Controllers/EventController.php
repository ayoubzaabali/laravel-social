<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\lib\Event;
use App\lib\Docs;
use App\lib\Users;
use App\lib\Profile;
use \Crypt;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function accept(Request $request){
    
        try {
        $eventID = $request->eventID;
        $userID=$request->userID;
        $var1= Event::accept_req($eventID,$userID);
        if(isset($var1)){
            if($var1==1){
           return response("OK", 200)->header('Content-Type', 'text/plain'); 
                
            }
        }
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (\RuntimeException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
    
       }
    }
        public function inaccept(Request $request){
    
        try {
        $eventID = $request->eventID;
        $userID=$request->userID;
        $var1= Event::inaccept_req($eventID,$userID);
        if(isset($var1)){
            if($var1==1){
           return response("OK", 200)->header('Content-Type', 'text/plain'); 
                
            }
        }
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (\RuntimeException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
    
       }
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {
        //echo($request->userID);
        /*  $eventID = $request->eventID;
          $eventID= Crypt::decryptString($eventID);

          return response(Event::Test_Privacy($eventID), 200)->header('Content-Type', 'text/plain');*/

         try {
        $id = Auth::id();
        $eventID = $request->eventID;
        $eventID= Crypt::decryptString($eventID);
        if(Event::Test_Privacy($eventID)==1){
          $active=0;  
        }else{
          $active=1;
 
        }
        $var1= Event::Follow_One_Event($id,$eventID,$active);
        if(isset($var1)){
            if($var1==1){
         return response($active, 200)->header('Content-Type', 'text/plain'); 
                
            }
        }
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (\RuntimeException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
    
       }
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request)
    {
        
         try {
        $id = Auth::id();
        $eventID = $request->eventID;
        $eventID= Crypt::decryptString($eventID);
        $var1= Event::UnFollow_One_Event($id,$eventID);
             
        if(isset($var1)){
            if($var1==1){
                
            return response( "OK", 200)->header('Content-Type', 'text/plain'); 

                 
            }
        }
        
             
        
       
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (\RuntimeException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
      }
        
    }
    
    public function Eventlist(Request $request){
        $id = Auth::id();
        $data = array();
        

        $events=Event::Events_Except_Mine($id);
        $data['events']=$events;
        return view('profile_propreties.events')->with('data',$data);
    }
    
    
    public function index(Request $request)
    {
        $proprety="hidden";
        
        try{
        $id =Crypt::decryptString($request->eventID) ;

        
       $user_id=Auth::id();
        if(Event::EventExist($id)){
            
            $data = array();
             if(Event::test_event_user(Auth::id(),$id)==true){
                 $proprety="";
             }
             
        
              $docs=Docs::select_Event_Docs($id);
               $data['pub']=$docs;
               $us_id=Auth::id();
              $event_info=Event::Event_info($id,$us_id);
              $data['event_info']=$event_info;
                $id =$us_id;

                 $events = Event::select_Event_User($id);
                 $data['events']=$events;
        
       // $event_trend = Event::showAll_Events();
       // $data['trends']=$event_trend;
      //  var_dump($data['trends']);
        $data['hide']=$proprety;
        return view('profile_propreties.Event_home')->with('data', $data);     
        }else{
            
        return view('profile_propreties.not')->with('mess',"Event not found");
 
            
        }
        }catch(\RuntimeException $e){
        return view('profile_propreties.not')->with('mess',"Event not found");
        }

     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEventCover(Request $request)
    {
       $id = $request->id;
        try{
        $id= Crypt::decryptString($id);
         } catch (DecryptException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
         }
        
    if ($request->has('cover')) {
     $path=  $request->file('cover')->store("link/");
     $data=array();
     $data['val']=Event::updateEventCover($path,$id);
     $data['path']=$path;
     
     return response($data , 200);    
    }else{
            return response( "NOT", 200)->header('Content-Type', 'text/plain'); 

    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $name = $request->input('title');
    $id = Auth::id();
    $opt = $request->input('options');
    $current_timestamp = Carbon::now();
    $original= $request->file('EventPhoto')->getClientOriginalName();
    if ($request->has('EventPhoto')) {
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
        

    $path=  $request->file('EventPhoto')->store("link/");
    Event::insert($name,$id,$path,$current_timestamp,$original,$opt);
         return redirect('/profile');
    }else{
         return redirect('/profile');
    }
        
    }
      

        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_event_user()
    {
        $id = Auth::id();
        $Events= select_Event_User($id);

        
    }
      
    
    
    
    
/**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    
    public function showAll()
    {
        $event = DB::table('event')->select('*')->get();
        return($event);
       // return view('profile_propreties.UserProfile');
    }
    
    
/**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    
    public function Count()
    {
        $events = DB::table('event')->count();
        return($events);
        
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
