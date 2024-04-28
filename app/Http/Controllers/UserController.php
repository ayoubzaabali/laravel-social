<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Crypt;
use App\lib\Users;
use App\lib\Event;
use Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $id = Auth::id();
       $data = array();
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {
        //echo($request->userID);
         try {
        $id = Auth::id();
        $userID = $request->userID;
        $userID= Crypt::decryptString($userID);
        $var1= Users::FollowUser($id,$userID);
        if(isset($var1)){
            if($var1==1){
                  $info=Event::select_Event_User($userID);
                   $var2=Event::FollowEvent($id,$info);
                if($var2==1){
                   return response( "OK", 200)
                  ->header('Content-Type', 'text/plain');   
                }else{
                   return response( "NOT", 200)
                  ->header('Content-Type', 'text/plain');   
                }
                 
            }
        }
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (DecryptException $e) {
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
        $userID = $request->userID;
        $test = $request->test;
        $userID= Crypt::decryptString($userID);
        $var1= Users::UnFollowUser($id,$userID);
        if($test==1){
        if(isset($var1)){
            if($var1==1){
                  $info=Event::select_Event_User($userID);
                   $var2=Event::UnFollowEvent($id,$info);
                if($var2==1){
                   return response( "OK", 200)
                  ->header('Content-Type', 'text/plain');   
                }else{
                   return response( "NOT", 200)
                  ->header('Content-Type', 'text/plain');   
                }
                 
            }
        }
        }
             
         if(isset($var1)) {
              if($var1==1){
                   return response( "OK", 200)
                  ->header('Content-Type', 'text/plain');   
                }else{
                   return response( "NOT", 200)
                  ->header('Content-Type', 'text/plain');   
                }
         }   
       
       // return response( $userID, 200)
             //     ->header('Content-Type', 'text/plain');        //var_dump($cord);
      } catch (DecryptException $e) {
        return response( "NOT", 200)->header('Content-Type', 'text/plain'); 
      }
        
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
