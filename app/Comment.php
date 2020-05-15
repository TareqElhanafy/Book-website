<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
      'content','user_id','fbook_id'
    ];
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function fbook(){
      return $this->belongsTo(Fbook::class);
    }
    public function pbook(){
      return $this->belongsTo(Fbook::class);
    }
}
