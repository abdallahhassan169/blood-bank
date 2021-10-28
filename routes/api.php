<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prifix'=>'v1'],function(){

  Route::post('emailsending','AuthController@emailSending');

  Route::post('register','AuthController@register');
  Route::post('login','AuthController@login');
  Route::get('donationrequestdetails','MainController@donationRequestDetails');
  Route::get('donationrequests','MainController@donationRequests');

  Route::get('posts','MainController@posts');
  Route::get('donationrequestdetails','MainController@donationRequestDetails');

    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');
    Route::get('bloodtypes','MainController@bloodTypes');
    Route::post('contacts','MainController@contacts');
    Route::get('categeory','MainController@categeory');
    Route::get('categoryposts','MainController@categoryPosts');
    Route::post('poststore','MainController@postStore');
    Route::get('donationrequeste','MainController@donationRequest');
    Route::post('tokencreate','MainController@tokenCreate');
    Route::post('is_favourite','MainController@favorite');








Route::group(['middleware'=>'auth:api'],function(){
  Route::post('new_password','MainController@newPassword');
  Route::post('removetoken','MainController@tokenRemove');

  Route::post('notifactionsettings','MainController@notifacationSettings');
  Route::get('notifactions','MainController@notifactionList');
  Route::get('settings','MainController@settings');
  Route::post('createtoken','MainController@tokenCreate');
  Route::post('createdonationrequest','MainController@donationRequestCreate');

  Route::get('notifactionlist','MainController@notifactionList');
  Route::get('notifactionscount','MainController@notifactionsCount');
  Route::get('post','MainController@post');





});
});
