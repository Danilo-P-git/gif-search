<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gif;
use App\Keyword;

class GifController extends Controller
{
    public function search(Request $request){
        $providers = Gif::all();
        foreach ($providers as $provider) {
            $slug = $provider->slug;
            $description = $provider->description;
            echo $slug. '<br>';
            echo  $description;
        };
        
    }
}
