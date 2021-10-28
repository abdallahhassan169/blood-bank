<?php

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
// Route::get('signin','front\loginController@signin')->name('signin');
// Route::get('signup','front\RegisterController@signup')->name('signup');
//
//
//
Route::get('signin','front\FrontController@signin')->name('signin');
Route::get('signup','front\RegisterController@signup')->name('signup');
Route::post('loggedin','front\loginController@loggedin')->name('loggedin');
Route::post('registered','front\RegisterController@register')->name('registered');
Route::get('/','front\FrontController@home')->name('/');


Route::group(['middleware'=>['front'],'prefix'=>'web'],function(){
  Route::get('search','front\FrontController@search')->name('search');
  Route::post('settings_create','front\FrontController@settings_create')->name('settings_create');
  Route::get('category_posts\{id}','front\CategoryController@category_posts')->name('category_posts');
  Route::get('categories','front\CategoryController@categories')->name('categories');
  Route::get('loggedout','front\loginController@loggedout',function(){return abort(404);})->name('loggedout');
  Route::get('settings','front\FrontController@settings')->name('settings');
  Route::get('articles','front\FrontController@articles')->name('articles');
  Route::get('about_us','front\FrontController@about_us')->name('about_us');
  Route::get('article_details\{id}','front\FrontController@article_details')->name('article_details');
  Route::get('contact','front\ContactController@contact_create')->name('contact');
  Route::post('contact_store','front\ContactController@contact_store')->name('contact_store');
  Route::get('donation','front\DonationsController@donations')->name('donation');
  Route::get('status_details\{id}','front\DonationsController@status_details')->name('status_details');
  Route::get('about_bank','front\FrontController@about_bank')->name('about_bank');
  Route::get('donations','front\DonationsController@donations')->name('donations');
Route::get('donation_create','front\DonationsController@donation_create')->name('donation_create');
Route::post('donation_store','front\DonationsController@donation_store')->name('donation_store');
Route::get('favorites','front\FavoriteController@favorites')->name('favorites');
Route::post('favorite_make','front\FavoriteController@favorite_make')->name('favorite_make');
Route::get('my_info','front\FrontController@my_info')->name('my_info');
Route::get('select_gov_city','front\DonationsController@select_gov_city')->name('select_gov_city');





  }
   );




Auth::routes();
Route::get('signuser',function(){return view('auth.login');})->name('signuser');
Route::group(['middleware'=>['auth'],'prifix'=>'admin'],function(){
 Route::get('index', 'adminController@index');
 Route::get('logout', 'Auth\LoginController@logout');

 Route::get('statistics', 'adminController@statistics');

 Route::resource('governorates', 'governoratecontroller');
 Route::resource('categories', 'categoriescontroller');
 Route::resource('cities', 'CitiesController');
 Route::resource('posts', 'PostsController');
 Route::resource('donation_request', 'DonationRequestsController');
 Route::resource('clients', 'ClientsController');
 Route::resource('settings', 'SettingsController');
 Route::resource('contacts', 'ContactsController');
 Route::resource('bloods', 'BloodsController');
 Route::resource('roles', 'RoleController');
 Route::resource('users', 'UserController');
 Route::get('/home', 'HomeController@index')->name('home');
}
 );
