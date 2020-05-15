<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fbook;
class Discussion extends Model
{
    protected $fillable=[
      'title','content','fbook_id'
    ];

    public function fbook(){
    return   $this->belongsTo(Fbook::class);
    }
    public function replies(){
      return $this->hasMany(Reply::class);
    }
}
