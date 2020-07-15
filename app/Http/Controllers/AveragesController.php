<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Average; //Averageモデル使用

class AveragesController extends Controller
{
    public function index()
    {
        // 一覧を取得
        $averages = Average::all();
        
        
        // $average = Average::Where('age_from', '<=', $num)->Where('age_to', '>=', $num)
        // ->Where('gender', $baby->gender)
        // ->get();

        // メッセージ一覧ビューでそれを表示
        return view('averages.index', [
            'averages' => $averages,
        ]);
    }
    
}
