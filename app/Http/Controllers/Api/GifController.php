<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gif;
use App\Keyword;
use Illuminate\Support\Facades\DB;

class GifController extends Controller
{
    public function search(Request $request){
        $providers = Gif::all();
        return response()->json($providers);
        
    }
    public function keywordSearch(Request $request) {
        $params = $request->fullurl();
        $queryRaw = str_replace($request->url().'?', '',$params);
        $query = str_replace('=', '',$queryRaw);
        $search = file_get_contents('http://'.'api.giphy.com/v1/gifs/search?api_key=XKr0PsRKWR2zKUX5kLJPpy0OrUUCnXnp&q='.$query);
        $output = json_decode($search);
        return response()->json($output);
    }

}
