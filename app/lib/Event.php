<?php

namespace App\lib;
use DB ;



class Event
{
    
    
 public static function  accept_req($event_id,$user_id){
    $affected = DB::table('user_follows_event')
              ->where([['user_id','=', $user_id],['event_id','=', $event_id]])
              ->update(['active' => 1]);  
     return($affected);
 }

public static function  inaccept_req($event_id,$user_id){
    $affected = DB::table('user_follows_event')
              ->where([['user_id','=', $user_id],['event_id','=', $event_id]])
              ->delete();  
     return($affected);
 }
 public static function Test_Privacy($event_id){
    return DB::table('event')->where([
      ['id', '=',$event_id],
      ['public', '=',0]  
       ])->exists();
     
 }
    
 public static function test_event_user($user_id,$event_id)
    {
       
      return DB::table('event')->where([
      ['user_id', '=',$user_id],
      ['id', '=',$event_id],
       ])->exists();
    }
    
    

    
public static function UnFollow_One_Event($id,$event_id)
    {
       try {
      DB::table('user_follows_event')->where([
      ['user_id', '=',$id],
      ['event_id', '=',$event_id],
       ])->delete(); 
     return(1);
     } catch(\Illuminate\Database\QueryException $ex){ 
    return($ex->getMessage());
      return(0);
     }
    
    }  
    
    
    

    
public static function Follow_One_Event($id,$event_id,$active)
    {
       try { 
     DB::table('user_follows_event')->insert([
    ['user_id' => $id,'event_id'=>$event_id,'active'=>$active]

     ]); 
     return(1);
     } catch(\Illuminate\Database\QueryException $ex){ 
    return(0);

 
     }
    
    }
    
    
    
 public static function Events_Except_Mine($id)
    {
      try { 
        $users = DB::table('event')->leftJoin('users', 'event.user_id', '=', 'users.id')
                                   ->select('event.*')
                                   ->where('users.id', '<>', $id)->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
 
    
    
    
    
    public static function updateEventCover($photo,$id){
         try { 
   $affected = DB::table('event')
              ->where('id', $id)
              ->update(['photo' => $photo]);
     return("OK");
     } catch(\Illuminate\Database\QueryException $ex){ 
       return("NOT");

 
     }
    }
    
    public static function FollowEvent($id,$info)
    {

       try {
           for ($i = 0; $i < count($info); $i++) {
               if(Event::FollowExist($id,$info[$i]->id)!=1 ){
                echo(Event::FollowExist($id,$info[$i]->id));
                DB::table('user_follows_event')->insert([
                ['user_id' => $id,'event_id'=>$info[$i]->id]

                  ]);  
               }

                }
   
          return(1);
    
     } catch(\Illuminate\Database\QueryException $ex){ 
           return(0);
 
     }
    
    }
    
public static function UnFollowEvent($id,$info)
    {

       try {
           for ($i = 0; $i < count($info); $i++) {
               if(Event::FollowExist($id,$info[$i]->id)==1 ){
                    DB::table('user_follows_event')->where([
                       ['user_id', '=',$id],
                       ['event_id', '=',$info[$i]->id],
                                                    ])->delete();  
               }

                }
   
          return(1);
    
     } catch(\Illuminate\Database\QueryException $ex){ 
           return(0);
 
     }
    
    }
    
    public static function FollowExist($id,$event_id){
    try { 
     return DB::table('user_follows_event')->where([
      ['user_id', '=',$id],
      ['event_id', '=',$event_id],
       ])->exists();
   
      } catch(\Illuminate\Database\QueryException $ex){ 
       dd($ex->getMessage()); 
 
        }
            
            
        }
    
    
    
    public static function EventExist($event_id){
    try { 
     return DB::table('event')->where('id', '=',$event_id)->exists();
   
      } catch(\Illuminate\Database\QueryException $ex){ 
       return(0); 
 
        }
            
            
        }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function insert($name,$id,$path,$current_timestamp,$original,$opt){
   
    try { 
     DB::table('event')->insert([
    ['titre' => $name,'user_id' => $id,'photo' => $path,'date_creation'=>$current_timestamp,'original_name'=>$original,'public'=>$opt]

     ]); 
     } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
public static function select_Event_User($id){
   
    try { 
      $event=DB::table('event')->leftJoin('user_follows_event', 'event.id', '=', 'user_follows_event.event_id')
                               ->select('event.*',DB::raw("count(user_follows_event.event_id) as count"))
                               ->where('event.user_id', '=', $id)
                               ->groupBy('event.id')->get();

      return($event);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
    

    
    
    
    
/**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    
    public static function showAll_Events()
    {
         try { 
        $event = DB::table('event')->leftJoin('user_follows_event', 'event.id', '=', 'user_follows_event.event_id')
                                   ->select('event.*',DB::raw("count(user_follows_event.event_id) as count"))
                                   ->groupBy('event.id')
                                    ->orderBy('count', 'desc')
                                    ->limit(5)
                                    ->get();
                                   

             return($event);            
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
    
       // return view('profile_propreties.UserProfile');
    }
    
    

    
public static function Event_info($id,$user_id)
    {
      try { 
        $events = DB::table('event')->Join('users', 'event.user_id', '=', 'users.id')
            ->select('event.*','users.id as user_id','users.photo as usphoto','users.name as usname')
            ->where('event.id', '=', $id)
            ->get();
     
          $events['Pends']=Event::select_Event_Pending($id);
        
        $events['followers']=Event::followers($id);
        $events['active']=Event::active($id,$user_id);
        return($events);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
public static function select_Event_Pending($id){
        $v = DB::table('user_follows_event')
               ->join('users', 'users.id', '=', 'user_follows_event.user_id')
               ->select('users.name as pname','users.photo as pphoto','users.id as user_id','user_follows_event.event_id as event_id')
               ->where([['user_follows_event.event_id', '=', $id],['user_follows_event.active', '=', 0]])
               ->get();

        return($v);
        
        
    }
    
public static function active($id,$user_id)
    {
      try { 
        $active = DB::table('user_follows_event')->select('active')->where([['event_id', '=', $id],['user_id', '=', $user_id]])->first();
        return($active);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
public static function followers($id)
    {
      try { 
        $count = DB::table('user_follows_event')->select('*')->where([['event_id', '=', $id],['active', '=', 1]])->count();
        return($count);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function edit($id)
    {
        //
    }

    
}
