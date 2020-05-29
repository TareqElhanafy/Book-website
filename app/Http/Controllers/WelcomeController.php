<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Fbook;
use App\Pbook;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
      $search=request()->query('search');
      if ($search) {
        $fbooks=Fbook::where('name','LIKE',"%{$search}%")->paginate(6);
      }else {
        $fbooks=Fbook::orderBy('views', 'DESC')->get();
      }
      return view('welcome')->with('categories',Category::all())
      ->with('fbooks',$fbooks);
    }


    public function show(Fbook $fbook){
$fbook->views=$fbook->views + 1 ;
$fbook->save();
      return view('showbook')->with('fbook',$fbook);
    }


    public function showpaidbooks(){
      return view('paid')->with('categories',Category::all())
      ->with('pbooks',Pbook::paginate(4));
    }


    public function pbookshow(Pbook $pbook){

if (Auth::check()) {
  Auth::user()->unreadNotifications->markAsRead();
}
$pbook->views=$pbook->views + 1 ;
$pbook->save();
      return view('showpaidbook')->with('pbook',$pbook);
    }
}
