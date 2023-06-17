<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchHistory;

class IndexController extends Controller
{
    //indexページ表示
    public function indexShow (Request $request){
        $key = $request -> keyword ?: '';

        if(!empty($key)){
            $api_req = 'https://www.googleapis.com/books/v1/volumes?q='.$key.'&maxResults=10';
            $json = file_get_contents($api_req);
            $api_res = json_decode($json, true);

            $res = $api_res['items'];
            SearchHistory::create([
                'key' => $key,
                'search_res' =>serialize($res)
            ]);
        }else{
            $api_res = '';
        }
        return view('index')->with([
            'keyword'  => $key,
            'res'     => $api_res
        ]);
    }
}
