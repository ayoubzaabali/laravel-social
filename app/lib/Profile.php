<?php

namespace App\lib;
use DB ;



class Profile
{
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function updateCover($photo,$id){
   
    try { 
   $affected = DB::table('users')
              ->where('id', $id)
              ->update(['cover' => $photo]);
     return("OK");
     } catch(\Illuminate\Database\QueryException $ex){ 
       return("NOT");

 
     }
    }
 
    
public static function updatePhoto($photo,$id){
   
    try { 
   $affected = DB::table('users')
              ->where('id', $id)
              ->update(['photo' => $photo]);
     return("OK");
     } catch(\Illuminate\Database\QueryException $ex){ 
       return("NOT");

 
     }
    }
    
    
    
    
    
    
}
