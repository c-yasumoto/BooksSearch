<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchHistory;

class HistoryController extends Controller
{
    // 検索履歴一覧表示
    public function listShow (Request $request){
        $SQL = SearchHistory::select('key', SearchHistory::raw('COUNT(*) as count_key'))
            ->groupBy('key')
            ->orderByRaw('count_key DESC , created_at DESC');
            // ->take(20)
        $contents = $SQL->get();
        return view('history')->with([
            'contents' => $contents
        ]);
    }


    // 検索単語→履歴表示
    public function keywordShow (Request $request){
        $req_key = $request -> keyword;
        $res = SearchHistory::where('key', $req_key)->first();
        if(empty($res)){
            $search_dates = '';
        }else{
            $search_dates = SearchHistory::select('created_at')
            -> where('key', $req_key)
            -> orderBy('created_at', 'DESC')
            ->limit(10)
            -> get();
        }
        return view('history_keyword')->with([
            'contents'  => $res,
            'dates'     => $search_dates
        ]);
    }
}
