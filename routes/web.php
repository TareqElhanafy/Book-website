<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

//Welcome Page of the website
Route::get('/','WelcomeController@index')->name('welcome.index');
Route::get('showbook/{fbook}','WelcomeController@show')->name('bookshow');
Route::get('paidbooks','WelcomeController@showpaidbooks')->name('paidbooks');
Route::get('showpaidbook/{pbook}','WelcomeController@pbookshow')->name('pbookshow');
Route::resource('fbooks/{fbook}/comments','CommentController');
//Cart Routes
Route::get('shopping/cart/{pbook}','CartController@index')->name('cart.index');
Route::post('cart/{pbook}','CartController@store')->name('cart.store');
Route::get('cart/show','CartController@showcart')->name('showcart');
Route::resource('fbook/{fbook}/discussions','DiscussionController');
Route::resource('discussion/{discussion}/replies','ReplyController');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

//Dashboard Routes

Route::middleware(['userOnline','auth'])->group(function(){
  Route::get('/home', 'HomeController@index')->name('home');
  //user routes
  Route::resource('users','UserController');
  Route::get('admin/{user}','UserController@makeAdmin')->name('make.admin');
  Route::get('remove/admin/{user}','UserController@removeAdmin')->name('remove.admin');
  //Categories routes
  Route::resource('categories','CategoryController');
  Route::put('category/available/{category}','CategoryController@makecatavailable')->name('makecatavailable');
  Route::put('category/unavailable/{category}','CategoryController@makecatunavailable')->name('makecatunavailable');
    //free books routes
  Route::resource('fbooks','FbookController');
  Route::put('fbooks/available/{fbook}','FbookController@makeavailable')->name('makeavailable');
  Route::put('fbooks/unavailable/{fbook}','FbookController@makeunavailable')->name('makeunavailable');
  //paid books routes
  Route::resource('pbooks','PbookController');
  Route::put('pbooks/available/{pbook}','PbookController@makeavailable')->name('makepavailable');
  Route::put('pbooks/unavailable/{pbook}','PbookController@makeunavailable')->name('makepunavailable');


});
