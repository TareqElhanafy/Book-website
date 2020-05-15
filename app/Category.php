<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function fbooks(){
    return $this->hasMany(Fbook::class);
  }
  public function pbooks(){
    return $this->hasMany(Fbook::class);
  }
    protected $fillable=[
      'name','available'
    ];
const Available_Category='1';
const UNAvailable_Category='0';

}
