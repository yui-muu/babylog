<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Log; //Logモデル使用
use App\Baby;//Babyモデル使用
use App\Average; //Averageモデル使用

use Carbon\Carbon;



class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     // getで/にアクセスされた場合の「History画面」
    public function index($id)
    {
        
        // babyを取得
        $baby = Baby::findOrFail($id);   
        // // ログの一覧を作成日時の降順で取得
        $logs = $baby->logs()->orderBy('created_at', 'desc')->paginate(10);
        
        //生後xx日を取得
        $dt = Carbon::now();
        $birthday = Carbon::parse($baby->birthday);
        $num = $dt->diffInDays($birthday);
        
        $average = Average::Where('age_from', '<=', $num)->Where('age_to', '>=', $num)
        ->Where('gender', $baby->gender)
        ->first();

        // 一覧ビューでそれを表示
        return view('logs.index', [
            'logs' => $logs,
            'baby' => $baby,
            'average' => $average,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     // getで/createにアクセスされた場合の「Babyの体重・身長登録処理」
    public function create($id)
    {
        // babyを取得
        $baby = Baby::findOrFail($id); 
        // logを取得
        $log = new Log;
        
        $error[] = "身長・体重どちらか入力して下さい。";
        $error2[] = "入力は1日１回のみ。☆編集はHistoryページへ☆";
        
        $log1 = $baby->logs()->orderBy('created_at', 'desc')->first();
        $dt = Carbon::now();
        
        if (!$log1) { 
            // ビューを表示
            return view('logs.create', [
                'log' => $log,
            ]);
        } elseif ($dt->format('Y-m-d') === $log1->created_at->format('Y-m-d')) { 
            return redirect()->back()->withErrors($error2);
        } else {
            // ビューを表示
            return view('logs.create', [
                'log' => $log,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     // postで/にアクセスされた場合の「Babyの体重・身長登録処理」
    public function store(Request $request)
    {
        // // // バリデーション
        $request->validate([
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
        ]);
        
        $baby = $request->session()->get('baby');
        // logを作成
        $log = new Log;
        $log->weight = $request->weight;
        $log->height = $request->height;
        $log->baby_id = $baby->id;
        $log->save();

        $error = array();
        $error[] = "身長・体重どちらか入力して下さい。";
        //身長と体重がどちらも入力されていない時のエラー表示
        if (($log->weight == null) && ($log->height == null)) { 
        return redirect()->back()->withErrors($error);
        } 
        // 前のURLへリダイレクトさせる
       return redirect(route('babies.show', ['baby' => $baby->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
    
     
     // getで/（任意のid）/editにアクセスされた場合の「体重・身長編集画面表示処理」
    public function edit($id, $log)
    {
         // babyを取得
        $baby = Baby::findOrFail($id);
        // // idの値でlogを検索して取得
        $log = Log::findOrFail($log);
        
        $error[] = "身長・体重どちらか入力して下さい。";

        // // 編集ビューでそれを表示
        return view('logs.edit', [
            'log' => $log,
            'error' => $error,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // putで（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
       // // // バリデーション
        $request->validate([
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
        ]);
        
        $baby = '';
        // idの値でlogを検索して取得
        $log = Log::findOrFail($id);
        // logを更新
        $log->weight = $request->weight;
        $log->height = $request->height;
        $log->save();
        
        $error = array();
        $error[] = "身長・体重どちらか入力して下さい。";
        //身長と体重がどちらも入力されていない時のエラー表示
        if (($log->weight == null) && ($log->height == null)) { 
        return redirect()->back()->withErrors($error);
        } 

        // Historyページへリダイレクトさせる
        return redirect(route('logs.index', ['baby' => $log->baby_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // deleteで/idにアクセスされた場合の「体重・身長削除処理」
    public function destroy($id)
    {
        // idの値でlogを検索して取得
        $log = Log::findOrFail($id);
        // logを削除
        $log->delete();

        // 前のページへリダイレクトさせる
        return back();
    }
}
