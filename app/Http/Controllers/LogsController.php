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
    public function create()
    {
        $log = new Log;
       

        // Baby作成ビューを表示
        return view('logs.create', [
            'log' => $log,
        ]);
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
        
        $baby = $request->session()->get('baby');
        // Babyを作成
        $log = new Log;
        $log->weight = $request->weight;
        $log->height = $request->height;
        $log->baby_id = $baby->id;
        $log->save();

        // 前のURLへリダイレクトさせる
       return redirect(route('babies.show', ['baby' => $baby->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
    public function show($id)
    { 
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // getで/（任意のid）/editにアクセスされた場合の「体重・身長編集画面表示処理」
    public function edit($id)
    {
        // // idの値でlogを検索して取得
        $log = Log::findOrFail($id);

        // // 編集ビューでそれを表示
        return view('logs.edit', [
            'log' => $log,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // putまたはpatchで/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でlogを検索して取得
        $log = Log::findOrFail($id);
        // logを更新
        $log->weight = $request->weight;
        $log->height = $request->height;
        $log->save();

        // トップページへリダイレクトさせる
        return redirect(route('logs.index', ['log' => $log->id]));
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
