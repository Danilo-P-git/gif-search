<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    public function gif() {

        return $this->belongsToMany('App\Gif');
      }
}
