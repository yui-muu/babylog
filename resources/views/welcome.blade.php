@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
            <div class="text-center">
                <br>
                <h1>BABY LOG</h1>
                <h2>Growth record
                <br>up to 1 year old baby</h2>
                <br><h3>１歳までの
                <br>赤ちゃんの成長記録！</h3>
                <hr>
                <br><p>身長・体重を入力するだけで
                <br>月齢による平均値と比較！
                <br>1日あたりの体重増加量も表示！</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
    @endif
@endsection