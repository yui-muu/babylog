<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Baby; //Babyモデル使用

class BabiesController extends Controller
{
    // getで/にアクセスされた場合の「select baby」
    public function index()
    {
        // Baby一覧を取得
        $babies = Baby::all();

        // Baby一覧ビューでそれを表示
        return view('babies.index', [
            'babies' => $babies,
        ]);
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
        $baby->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

}
