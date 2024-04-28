<?php

namespace App\lib;
use DB ;



class Users
{
 

    public static function Users_Except_One($id)
    {
      try { 
        $users = DB::table('users')->select('*')->where('id', '<>', $id)->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
public static function Users_Except_One_five($id)
    {
      try { 
        $users = DB::table('users')->select('*')
                                   ->where('id', '<>', $id)
                                   ->limit(5)
                                   ->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
    public static function mydata($id)
    {
      try { 
        $users = DB::table('users')->select('*')
                                   ->where('id', '=', $id)
                                   ->first();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
public static function FollowUser($id,$idFollowed)
    {
       try { 
     DB::table('user_follows_user2')->insert([
    ['user_id' => $id,'followed_user_id'=>$idFollowed]

     ]); 
     return(1);
     } catch(\Illuminate\Database\QueryException $ex){ 
    return(0);

 
     }
    
    }
    
    
    public static function FollowExist($id,$followed_id){
    try { 
     return DB::table('user_follows_user2')->where([
      ['user_id', '=',$id],
      ['followed_user_id', '=',$followed_id],
       ])->exists();
   
      } catch(\Illuminate\Database\QueryException $ex){ 
        
 
        }
            
            
        }
    
    
        
public static function UnFollowUser($id,$idFollowed)
    {
       try {
      DB::table('user_follows_user2')->where([
      ['user_id', '=',$id],
      ['followed_user_id', '=',$idFollowed],
       ])->delete(); 
     return(1);
     } catch(\Illuminate\Database\QueryException $ex){ 
    return($ex->getMessage());
      return(0);
     }
    
    }
    
    
    public static function User_info($id)
    {
      try { 
        $users = DB::table('users')->select('*')->where('id', '=', $id)->get();
        $users['followers']=Users::followers($id);
        $users['following']=Users::following($id);

        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
   public static function followers($id)
    {
      try { 
        $users = DB::table('user_follows_user2')->select('*')->where('followed_user_id', '=', $id)->count();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
    public static function following($id)
    {
      try { 
        $users = DB::table('user_follows_user2')->select('*')->where('user_id', '=', $id)->count();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    
public static function User_exist($id)
    {
      try { 
        $users = DB::table('users')->select('*')->where('id', '=', $id)->exists();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
    }
    

    


    
}
