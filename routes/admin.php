<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Config::set('auth.defines','admin');

    Route::get('/login','AdminController@login')->name('adminLogin');
    Route::post('/dologin','AdminController@doAdminlogin')->name('doAdminlogin');
     Route::get('/forget/password','AdminController@forget')->name('adminforgetpage');
Route::post('/send/email/verification','AdminController@sendPasswordEmail')->name('sendPasswordEmail');
Route::get('/verify/{token}/email','AdminController@verify')->name('adminverify');
Route::get('/new/{admin}/password','AdminController@viewResetPage')->name('newresetpassword');
Route::put('/reset/{admin}/password','AdminController@doAdminPasswordreset')->name('doAdminPasswordreset');


Route::middleware(['dadmin:admin','adminonline',])->group(function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashbord');
    Route::any('/logout','AdminController@logout')->name('adminlogout');
    //user routes
    Route::resource('users','UserController');
    Route::get('admin/{user}','UserController@makeAdmin')->name('make.admin');
    Route::get('remove/admin/{user}','UserController@removeAdmin')->name('remove.admin');
    //Categories routes
Route::resource('categories','CategoryController');
Route::put('category/available/{category}','CategoryController@makecatavailable')->name('makecatavailable');
Route::put('category/unavailable/{category}','CategoryController@makecatunavailable')->name('makecatunavailable');
  //free books routes
  Route::resource('fbooks','AdminFreeBookController',[
    'names'=>[
      'index'=>'adminfbooks.index',
      'store'=>'adminfbooks.store',
      'create'=>'adminfbooks.create',
      'update'=>'adminfbooks.update',
      'destroy'=>'adminfbooks.destroy',
      'show'=>'adminfbooks.show',
      'edit'=>'adminfbooks.edit'
  
    ]
  ]);

Route::put('fbooks/available/{fbook}','AdminFreeBookController@makeavailable')->name('makeavailable');
Route::put('fbooks/unavailable/{fbook}','AdminFreeBookController@makeunavailable')->name('makeunavailable');
//paid books routes
Route::resource('pbooks','AdminPaidBookController',[
  'names'=>[
    'index'=>'adminpbooks.index',
    'store'=>'adminpbooks.store',
    'create'=>'adminpbooks.create',
    'update'=>'adminpbooks.update',
    'destroy'=>'adminpbooks.destroy',
    'show'=>'adminpbooks.show',
    'edit'=>'adminpbooks.edit'

  ]
]);

Route::put('pbooks/available/{pbook}','AdminPaidBookController@makeavailable')->name('makepavailable');
Route::put('pbooks/unavailable/{pbook}','AdminPaidBookController@makeunavailable')->name('makepunavailable');
});
});