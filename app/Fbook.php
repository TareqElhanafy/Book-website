<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fbook extends Model
{
  public function category(){
    return $this->belongsTo(Category::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function comments(){
    return $this->hasMany(Comment::class);
  }
  public function discussion(){
  return   $this->hasOne(Discussion::class);
  }
  protected $fillable=[
    'name','writer_name','description','image','available','category_id','user_id'
  ];
    const available_book='1';
    const unavailable_book='0';

}
