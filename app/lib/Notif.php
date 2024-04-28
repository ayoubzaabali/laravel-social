<?php

namespace App\lib;
use DB ;



class Notif
{
    
    
    
    public static function setStatus($id,$user_id){
        $affected = DB::table('notification')
              ->where([['document_id', $id],['user_id', $user_id]])
              ->update(['new' => true]);
    }
    
    
  public static function getNewNotification($user_id,$date){
      try{
          
      
         return(  DB::table('notification')->join('document', 'notification.document_id', '=', 'document.id')
                                       ->join('users', 'users.id', '=', 'document.user_id')
                                      ->join('event', 'event.id', '=', 'document.event_id')
                                       ->select('document.user_id','document.id as           document_id','document.event_id','document.date_creation','event.titre','users.name as usname',
                                             'users.photo as usphoto','notification.new')
                                      ->where([['document.date_creation','>', $date],['notification.user_id', $user_id]])
                                      ->get());   
         }catch(\Illuminate\Database\QueryException $ex){
          return(0);
          
      }         
              
    }
    
    
    
    
    public static function store($data){
        
       if(count($data)!=0){
            for ($i = 0; $i <count($data); $i++) {
                       $data[$i]=(array) $data[$i];
                     }
            DB::table('notification')->insert($data); 
        }
        
    }
 
    
public static function MyNotificationsTen($id){
   
    try { 
      $event=DB::table('notification')->join('document', 'notification.document_id', '=', 'document.id')
                                     ->join('users', 'users.id', '=', 'document.user_id')
                                      ->join('event', 'event.id', '=', 'document.event_id')
                                     ->select('document.user_id','document.id as           document_id','document.event_id','document.date_creation','event.titre','users.name as usname',
                                             'users.photo as usphoto','notification.new')
                                     ->where('notification.user_id', '=', $id)
                                     ->orderBy('document.date_creation', 'desc')
                                     ->limit(10)
                                     ->get();

      return($event);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
    public static function MyNotifications($id){
   
    try { 
      $event=DB::table('notification')->join('document', 'notification.document_id', '=', 'document.id')
                                     ->join('users', 'users.id', '=', 'document.user_id')
                                      ->join('event', 'event.id', '=', 'document.event_id')
                                     ->select('document.user_id','document.id as           document_id','document.event_id','document.date_creation','event.titre','users.name as usname',
                                             'users.photo as usphoto','notification.new')
                                     ->where('notification.user_id', '=', $id)
                                     ->orderBy('document.date_creation', 'desc')
                                     ->get();

      return($event);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }


    

 public static function select_Notif_User_Docs($id,$doc_id){
   
    try { 
      $event=DB::table('event')->leftJoin('user_follows_event', 'event.id', '=', 'user_follows_event.event_id')
                                ->join('document', 'user_follows_event.event_id', '=', 'document.event_id')
                               ->select('user_follows_event.user_id','document.id as document_id')
                               ->where([['event.user_id', '=', $id],['document.id', '=', $doc_id]])
                                ->get()->toArray();;

      return($event);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
}
