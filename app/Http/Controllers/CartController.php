<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pbook;
use Cart;
use App\Notifications\NewBookSold;
class CartController extends Controller
{

public function index(Pbook $pbook){
  return view('cart.index')->with('pbook',$pbook);
}


public function store(Pbook $pbook){

$userID=auth()->user()->id;
  $cart=Cart::session($userID)->add(array(
    'id' => $pbook->id, // inique row ID
    'name' => $pbook->name,
    'price' => $pbook->price,
    'quantity' => request()->quantity,
    'attributes' => array()
));

$cart->associate('App\Pbook');

$pbook->user->notify(new NewBookSold($pbook));
return redirect(route('showcart'));
}

public function showcart(){

  return view('cart.showall');
}
}
