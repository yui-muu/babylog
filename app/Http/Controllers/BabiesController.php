<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Baby; //Babyモデル使用
use App\Log; //Logモデル使用

class BabiesController extends Controller
{
    // getで/にアクセスされた場合の「select baby」
    public function index()
    {
        
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザのBabyの一覧を作成日時の降順で取得
            $babies = $user->babies()->orderBy('created_at', 'desc')->paginate(10);
            
            // TODO: $babiesが0件なら、新規追加にredirectする。
            if (count($babies) == 0) {
                return redirect('babies/create');
            // $babiesが1件なら、Mypageを表示する。
            } else if (count($babies) == 1) {
               $baby = $babies->first();
               return redirect(route('babies.show', ['baby' => $baby->id]));
                
            } else {
            // それ以外はBaby一覧ビューでそれを表示
                return view('babies.index', [
                    'babies' => $babies,
                ]);
            }
        }

        // Welcomeビューでそれらを表示
        return view('welcome');
    }

    // getで/createにアクセスされた場合の「Baby登録処理」
    public function create()
    {
        $baby = new Baby;

        // Baby作成ビューを表示
        return view('babies.create', [
            'baby' => $baby,
        ]);
    }

    // postで/にアクセスされた場合の「Baby登録処理」
    public function store(Request $request)
    {
        // Babyを作成
        $baby = new Baby;
        $baby->name = $request->name;
        $baby->birthday = $request->birthday;
        $baby->gender = $request->gender;
        $baby->weight = $request->weight;
        $baby->height = $request->height;
        $baby->user_id = \Auth::user()->id;
        $baby->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }


    // getで/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でBabyを検索して取得
        $baby = Baby::findOrFail($id);

        // 編集ビューでそれを表示
        return view('babies.edit', [
            'baby' => $baby,
        ]);
    }

    // putまたはpatchで/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でBabyを検索して取得
        $baby = Baby::findOrFail($id);
        // 更新
        $baby->name = $request->name;
        $baby->birthday = $request->birthday;
        $baby->gender = $request->gender;
        $baby->weight = $request->weight;
        $baby->height = $request->height;
        $baby->user_id = \Auth::user()->id;
        $baby->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
     // getで/にアクセスされた場合の「Myapage画面」
    public function show(Request $request, $id)
    { 
        $baby = Baby::findOrFail($id);   
        $request->session()->put('baby', $baby);
        
        $log = $baby->logs()->orderBy('created_at', 'desc')->first();
        // 詳細ビューでそれを表示
        return view('babies.show', [
            'baby' => $baby,
            'log' => $log,
        ]);
        
    }

}
