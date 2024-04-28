<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});




//home&login routes
Route::get('/home', function () {
    return view('home_propreties.home');
})->name('home');
Route::get('/about', function () {
    return view('home_propreties.about');
})->name('about');
Route::get('/gallery', function () {
    return view('home_propreties.gallery');
})->name('gallery');
Route::get('/services', function () {
    return view('home_propreties.services');
})->name('services');
Route::get('/contact', function () {
    return view('home_propreties.contact');
})->name('contact');
//Route::redirect('/', 'home');

Route::get('/log', function () {
    return view('profile_propreties.signup');
});

Auth::routes();
//home&login routes___END


//Profile routes
Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::get('/profile/{ProfileID}', 'ProfileController@index')->middleware('auth');
Route::get('/profiles', 'ProfileController@list')->middleware('auth');
Route::get('/', 'ProfileController@home');
Route::get('/logouut', 'ProfileController@logouut')->middleware('auth');
//Profile routes___END

//event routes
Route::post('/addEvent', 'EventController@store')->name('addEvent');
Route::get('/addEvent', 'EventController@store')->middleware('Method','auth');
Route::get('/Event/{eventID}', 'EventController@index')->middleware('auth');
Route::get('/events', 'EventController@Eventlist')->middleware('auth');
Route::get('/followev/{eventID}','EventController@follow')->middleware('auth');
Route::get('/accept/{eventID}/{userID}','EventController@accept')->middleware('auth');
Route::get('/inaccept/{eventID}/{userID}','EventController@inaccept')->middleware('auth');
Route::get('/unfollowev/{eventID}', 'EventController@unfollow')->middleware('auth');
//event routes___END

//Document routes
Route::post('/addDoc', 'DocumentController@store')->name('addDoc');
Route::get('/addDoc', 'DocumentController@store')->middleware('Method','auth');
Route::get('/Doc/{docID}', 'DocumentController@show')->middleware('auth');

//Document routes___END

//Cover
Route::post('/sendCover', 'ProfileController@send')->middleware('auth');
Route::get('/sendCover')->middleware('auth');
Route::post('/sendEventCover', 'EventController@sendEventCover')->middleware('auth');
Route::get('/sendEventCover')->middleware('auth');

Route::post('/sendPhoto', 'ProfileController@sendPhoto')->middleware('auth');
Route::get('/sendPhoto')->middleware('auth');

//Cover_end

//doccontrollers
Route::get('/download/{fileID}', 'DocumentController@downloader')->middleware('auth');
Route::get('/like/{fileID}', 'DocumentController@like')->middleware('auth');
Route::get('/dislike/{fileID}', 'DocumentController@Dislike')->middleware('auth');
Route::get('/comment/{fileID}/{data}', 'DocumentController@comment')->middleware('auth');
Route::get('/getLatest/{fileID}', 'DocumentController@getLastCom')->middleware('auth');
//ddoccontrollers_end


//userroutes
Route::get('/follow/{userID}', 'UserController@follow')->middleware('auth');
Route::get('/unfollow/{userID}/{test}', 'UserController@unfollow')->middleware('auth');
//userroutes_end



//notification
Route::get('/Notifications', 'NotificationController@get')->middleware('auth');
Route::get('/getMynotification/{LastNotif}', 'NotificationController@getNewNotifications')->middleware('auth');

//notofication_end
