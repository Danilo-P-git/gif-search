<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    public function keyword() {

        return $this->belongsToMany('App\Keyword');
      }
}
