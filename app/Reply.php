<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $fillable=[
    'content','user_id','discussion_id'
  ];
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function discussion(){
    return $this->belongsTo(Discussion::class);
  }
}
