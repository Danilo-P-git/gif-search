<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gif;
use App\Keyword;
use App\Keyword_gif;
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
        $queryRefined = str_replace('=', '',$queryRaw);
        $query = preg_replace("/[^ \w]+/", "", $queryRefined);
        $search = file_get_contents('http://'.'api.giphy.com/v1/gifs/search?api_key=XKr0PsRKWR2zKUX5kLJPpy0OrUUCnXnp&q='.$query);
        $output = json_decode($search);
        $results = $output->data;
        $search2 = file_get_contents('https://api.tenor.com/v1/search?key=5GD7GSJ75A4Z&q='.$query);
        $output2 = json_decode($search2);
        $resultsTenor = $output2->results;
        
        $arrayResults = [];
        
        foreach ($results as $result) {
            $url = $result->url;
            $arrayResults[]= $url;
            
        }
        foreach ($resultsTenor as $result) {
            $url = $result->url;
            $arrayResults[]= $url;
            
        }
        $checker = Keyword::where('keyword_text', $query)->count();
        
        if ($checker == 0) {
            $newKeyword = new Keyword();
            $newKeyword->keyword_text = $query;
            $newKeyword->save();
        } 

        $counterUp = DB::table('gifs')->increment('counter');

        
        
        return response()->json([
            'result'=> $arrayResults
        ]);


    }
    public function providerStat($slug){
        $provider = Gif::where('slug', $slug)->count();
        if ($provider == 1) {
            
        }
    }
}
