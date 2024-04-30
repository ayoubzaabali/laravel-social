<?php

namespace App\lib;
use DB ;
use \Crypt;




class Docs
{
    
    
    
     public static function test_my_doc($user_id,$document_id){
        $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->where([['document.id', '=',   $document_id],['document.user_id', '=',   $user_id]])
            ->exists(); 
         return $docs;
     }
   
    
    
    
 public static function addView($user_id,$document_id,$current_timestamp){
         DB::table('view')->insert([
    ['date'=>$current_timestamp,'user_id'=>$user_id,'document_id'=>$document_id]

     ]); 
         
    }
    
    
 public static function addLike($user_id,$document_id,$current_timestamp){
         DB::table('doc_likes')->insert([
    ['date'=>$current_timestamp,'user_id'=>$user_id,'document_id'=>$document_id]

     ]); 
         
    }
    
public static function addComment($user_id,$document_id,$current_timestamp,$data){
         DB::table('comment')->insert([
    ['date'=>$current_timestamp,'user_id'=>$user_id,'document_id'=>$document_id,'content'=>$data]

     ]); 
         
    }
    
    public static function removeLike($user_id,$document_id){
        
        $whereArray = array('user_id'=>$user_id,'document_id'=>$document_id);

        $query = DB::table('doc_likes');

      foreach($whereArray as $field => $value) {
                $query->where($field, $value);
             }


    return $query->delete();
    
         
    }
    
    
    
    
    
    
public static function select_Doc($id){
    try { 
        $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->join('event', 'event.id', '=', 'document.event_id')
            ->select('document.*', 'event.titre as evtitre', 'users.name as usname','users.photo as usphoto')
            ->where('document.id', '=',   $id)
            ->first();
            $docs->viewers=Docs::select_Docs_Viewers($docs->id);
            $docs->downloads=Docs::select_Docs_Downloads($docs->id);
            $docs->likes=Docs::select_Docs_Likes($docs->id);
            $docs->coms=Docs::select_Docs_Coms($docs->id);

            for($j = 0; $j <count($docs->viewers); $j++){
               $docs->viewers[$j]->user_id=Crypt::encryptString($docs->viewers[$j]->user_id) ;

            }
           
     
            
        return($docs);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
        
    }
    
    public static function liked($document_id,$user_id){
        $docs = DB::table('doc_likes')
            ->where([['doc_likes.document_id', '=',   $document_id],['doc_likes.user_id', '=',   $user_id]])
            ->exists(); 
         return $docs;
    }
    
   public static function select_Event_Docs($id){
   
    try { 
      //$docs=DB::table('document')->where('user_id', '=', $id)->get();
      $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->join('event', 'event.id', '=', 'document.event_id')
            ->select('document.*', 'event.titre as evtitre', 'users.name as usname','users.photo as usphoto')
            ->where('event.id', '=', $id)

             ->orderBy('document.date_creation', 'desc')->get();
        
        for ($i = 0; $i <count($docs); $i++) {
            $docs[$i]->viewers=Docs::select_Docs_Viewers($docs[$i]->id);
            $docs[$i]->downloads=Docs::select_Docs_Downloads($docs[$i]->id);
            $docs[$i]->likes=Docs::select_Docs_Likes($docs[$i]->id);
            $docs[$i]->coms=Docs::select_Docs_Coms($docs[$i]->id);

            for($j = 0; $j <count($docs[$i]->viewers); $j++){
               $docs[$i]->viewers[$j]->user_id=Crypt::encryptString($docs[$i]->viewers[$j]->user_id) ;

            }
           
     
            }
      return($docs);
        
     
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function insert($name,$id,$path,$current_timestamp,$original,$description,$event_id){
    try { 
     $insertGetId=DB::table('document')->insertGetId(
    ['titre' => $name,'user_id' => $id,'path' => $path,'date_creation'=>$current_timestamp,'original_name'=>$original,'descr'=>$description,'event_id'=>$event_id]

     ); 
       // $ids = DB::getPdo()->lastInsertId();
        return($insertGetId);
        
     } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
public static function select_Docs_User($id){
   
    try { 
      //$docs=DB::table('document')->where('user_id', '=', $id)->get();
      $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->join('event', 'event.id', '=', 'document.event_id')

             ->select('document.*', 'event.titre as evtitre', 'users.name as usname','users.photo as usphoto')
            ->where('document.user_id', '=', $id)
             ->orderBy('document.date_creation', 'desc')->get();
      
        for ($i = 0; $i <count($docs); $i++) {
            $docs[$i]->viewers=Docs::select_Docs_Viewers($docs[$i]->id);
            $docs[$i]->downloads=Docs::select_Docs_Downloads($docs[$i]->id);
            $docs[$i]->likes=Docs::select_Docs_Likes($docs[$i]->id);
            $docs[$i]->coms=Docs::select_Docs_Coms($docs[$i]->id);

            for($j = 0; $j <count($docs[$i]->viewers); $j++){
               $docs[$i]->viewers[$j]->user_id=Crypt::encryptString($docs[$i]->viewers[$j]->user_id) ;

            }
           
     
            }

            return($docs);

   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
    public static function select_Docs_Likes($id){
        $v = DB::table('doc_likes')
               ->join('users', 'doc_likes.user_id', '=', 'users.id')
               ->select('users.name as lname','users.photo as lphoto','doc_likes.date as ldate','users.id as user_id')
               ->where('doc_likes.document_id', '=', $id)
               ->get();

        return($v);
        
        
    }
    
   public static function getLast($id){
        $v = DB::table('comment')
               ->join('users', 'comment.user_id', '=', 'users.id')
               ->select('users.name as cname','users.photo as cphoto','comment.date as cdate','comment.content as content')
               ->where('comment.document_id', '=', $id)
               ->orderByDesc('comment.date')
               ->first();

        return($v);    
   }
    
    public static function select_Docs_Viewers($id){
        $v = DB::table('view')
               ->join('users', 'view.user_id', '=', 'users.id')
               ->select('users.name as vname','users.photo as vphoto','view.date as vdate','users.id as user_id')
               ->where('view.document_id', '=', $id)
               ->get();

        return($v);
        
        
    }
    
    public static function select_Docs_Coms($id){
        $v = DB::table('comment')
               ->join('users', 'comment.user_id', '=', 'users.id')
               ->select('users.name as cname','users.photo as cphoto','comment.date as cdate','comment.content')
               ->where('comment.document_id', '=', $id)
               ->orderBy('comment.date', 'desc')->get();

        return($v);
        
        
    }
    
        public static function select_Docs_Downloads($id){
        $v = DB::table('downloaded_by')
               ->join('users', 'downloaded_by.user_id', '=', 'users.id')
               ->select('users.name as dname','users.photo as dphoto','downloaded_by.date as ddate','users.id as user_id')
               ->where('downloaded_by.document_id', '=', $id)
               ->get();

        return($v);
        
        
    }

    
    
public static function select_Followed_Event_Docs($id,$id2){
   
    try { 
      //$docs=DB::table('document')->where('user_id', '=', $id)->get();
      $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->join('event', 'event.id', '=', 'document.event_id')
            ->join('user_follows_event', 'user_follows_event.event_id', '=', 'document.event_id')
            ->join('view', 'view.document_id', '=', 'document.id')
            ->select('document.*', 'event.titre as evtitre', 'users.name as usname','users.photo as usphoto')
            ->where([['document.user_id', '=',$id],['user_follows_event.user_id', '=',$id2],])
             ->orderBy('document.date_creation', 'desc')->get();
        
        for ($i = 0; $i <count($docs); $i++) {
            $docs[$i]->viewers=Docs::select_Docs_Viewers($docs[$i]->id);
            $docs[$i]->downloads=Docs::select_Docs_Downloads($docs[$i]->id);
            $docs[$i]->likes=Docs::select_Docs_Likes($docs[$i]->id);
            $docs[$i]->coms=Docs::select_Docs_Coms($docs[$i]->id);
            }
         //  var_dump($docs[0]->viewers[0]->vname);

            return($docs);
        
     
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
  public static function  InserDownlaodedSuc($document_id,$user_id,$current_timestamp){
       DB::table('downloaded_by')->insert([
    ['date'=>$current_timestamp,'user_id'=>$user_id,'document_id'=>$document_id]

     ]); 
      
  }
        
public static function select_Followed_Event_Docs_home($id2){
   
    try { 
      //$docs=DB::table('document')->where('user_id', '=', $id)->get();
      $docs = DB::table('document')
            ->join('users', 'users.id', '=', 'document.user_id')
            ->join('event', 'event.id', '=', 'document.event_id')
            ->join('user_follows_event', 'user_follows_event.event_id', '=', 'document.event_id')
            ->select('document.*', 'event.titre as evtitre', 'users.name as usname','users.photo as usphoto')
            ->where('user_follows_event.user_id', '=',$id2)
             ->orderBy('document.date_creation', 'desc')->get();
            for ($i = 0; $i <count($docs); $i++) {
            $docs[$i]->viewers=Docs::select_Docs_Viewers($docs[$i]->id);
            $docs[$i]->downloads=Docs::select_Docs_Downloads($docs[$i]->id);
            $docs[$i]->likes=Docs::select_Docs_Likes($docs[$i]->id);
            $docs[$i]->coms=Docs::select_Docs_Coms($docs[$i]->id);
            }
      return($docs);
        
     
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
    
    
public static function select_file($id){
   
    try { 
      $myfile=DB::table('document')->select('document.path','document.original_name')->where('id', '=', $id)->get();
      return($myfile[0]);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    

    
}
