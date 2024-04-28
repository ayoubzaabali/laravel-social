<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\lib\Event;
use App\lib\Docs;
use App\lib\Users;
use App\lib\Profile;
use App\lib\Notif;

use \Crypt;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
       $notifs=Notif::MyNotifications(Auth::id());
       return view('profile_propreties.notifications')->with('notifs',$notifs);

    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNewNotifications(Request $request)
    {
        
    $notif=Notif::getNewNotification(Auth::id(),$request->LastNotif);
    if(count($notif)!=0){
    for ($i = 0; $i <count($notif); $i++) {
        $notif[$i]->user_id=Crypt::encryptString($notif[$i]->user_id);
        $notif[$i]->document_id=Crypt::encryptString($notif[$i]->document_id);
        $notif[$i]->event_id=Crypt::encryptString($notif[$i]->event_id);
    }       
    }
    
    return response( $notif, 200)->header('Content-Type', 'text/plain'); 
    

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
