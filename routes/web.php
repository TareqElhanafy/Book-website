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

Route::middleware(['adminonline','auth','userOnline'])->group(function(){
 
  //free books routes
Route::resource('fbooks','FbookController');

//paid books routes
Route::resource('pbooks','PbookController');

Route::get('profile/{user}','UserController@profile')->name('profile');
});
