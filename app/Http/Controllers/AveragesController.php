<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Baby;//Babyモデル使用
use App\Average; //Averageモデル使用

class AveragesController extends Controller
{
    public function index()
    {
        // 一覧を取得
        $boyAverages = Average::Where('gender', 'Boy')
        ->get();
        $girlAverages = Average::Where('gender', 'Girl')
        ->get();

        // メッセージ一覧ビューでそれを表示
        return view('averages.index', [
            'boyAverages' => $boyAverages,
            'girlAverages' => $girlAverages,
        ]);
    }
    
}
