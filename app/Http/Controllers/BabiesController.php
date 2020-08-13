<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Baby; //Babyモデル使用
use App\Log; //Logモデル使用
use App\Average; //Averageモデル使用

use Carbon\Carbon;


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
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'birthday' => 'required',
            'gender' => 'required',
            'weight' => 'required|numeric|max:99.9|regex:/^\d{1,2}.\d$/',
            'height' => 'required|numeric|max:99.9|regex:/^\d{1,2}.\d$/',
        ]);
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
        // 認証済みユーザ（閲覧者）がそのbabyの所有者である場合は、babyを更新
        if (\Auth::id() === $baby->user_id) {
        // 編集ビューでそれを表示
        return view('babies.edit', [
            'baby' => $baby,
        ]);
        }
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // putまたはpatchで/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'birthday' => 'required',
            'gender' => 'required',
            'weight' => 'required|numeric|max:99.9|regex:/^\d{1,2}.\d$/',
            'height' => 'required|numeric|max:99.9|regex:/^\d{1,2}.\d$/',
        ]);
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
        $gender = $baby->gender;
        
        
        //ログを日付昇順で表示
        $logs = $baby->logs()->orderBy('created_at', 'desc')->get();
        $log = \Arr::get($logs, 0);
        $logFormer = \Arr::get($logs, 1);
        
        //生後xx日を取得
        $dt = Carbon::now();
        $birthday = Carbon::parse($baby->birthday);
        $num = $dt->diffInDays($birthday);
        
       $logDays = '';
       $registerLogDays = '';
        
        //前回のLogと直近のLogの日付の経過日数を取得し、1日あたりの体重の増加量を取得
        if ($log && $logFormer) { 
            $latest = Carbon::parse($log->created_at);
            $former = Carbon::parse($logFormer->created_at);
            $logDays = $latest->diffInDays($former);
        } elseif ($log) {
            // 初回のBabyと直近のLogの日付の経過日数を取得し、1日あたりの体重の増加量を取得
            $latest = Carbon::parse($log->created_at);
            $registerDay = Carbon::parse($baby->birthday);
            $registerLogDays = $latest->diffInDays($registerDay);
        } else {
            // 処理をしない
        }
        
        
        $gainPerDay = null;
        $firstGainPerDay = null;
        $nothing = '---';
        $result = '';
        //ログがあり、かつlogDaysとregisterLogDaysが０でない時、
        //ログが２つ以上なら$gainPerDayの処理、ログが１つしかないなら$firstGainPerDayの処理
        if ($log && !($logDays === 0) && !($registerLogDays === 0)) {
            if (count($logs) >= 2) {
                $gainPerDay = floor(($log->weight - $logFormer->weight) / $logDays * 1000);
                $result = $gainPerDay;
            } elseif (count($logs) === 1) {
                $firstGainPerDay = floor(($log->weight - $baby->weight) / $registerLogDays * 1000);
                $result = $firstGainPerDay;
            }
        //logDaysとregisterLogDaysが０のとき
        } elseif (($logDays === 0) || ($registerLogDays === 0)) {
            // 処理をしない
        } else {
            $nothing;
            $result = $nothing;
        }
        //averageを取得
        $average = Average::where('age_from', '<=', $num)->where('age_to', '>=', $num)
        ->where('gender', $baby->gender)
        ->get()
        ->last();
       
        // 認証済みユーザ（閲覧者）がそのbabyの所有者である場合は表示。
        if (\Auth::id() === $baby->user_id) {
        // 詳細ビューでそれを表示
        return view('babies.show', [
            'baby' => $baby,
            'gender' => $gender,
            'log' => $log,
            'average' => $average,
            'num' => $num,
            'result' => $result,
            
        ]);
        }
        // トップページへリダイレクトさせる
        return redirect('/');
    
        
        
    }
     // deleteで/idにアクセスされた場合の「baby削除処理」
    public function destroy($id)
    {
        // idの値でbabyを検索して取得
        $baby = Baby::findOrFail($id);
        // 認証済みユーザ（閲覧者）がそのbabyの所有者である場合は、babyを削除
        if (\Auth::id() === $baby->user_id) {
        $baby->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }

}
