<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
  protected $casts = [
    'credential' => 'array'
  ];
  protected $hidden = [
    'id', 'credential' , 'created_at' , 'updated_at'
  ];
    public function keyword() {

        return $this->belongsToMany('App\Keyword');
      }
}
