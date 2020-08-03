@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
            <div class="text-center">
                <h1>BABY LOG</h1>
                <h2>Growth record
                <br>up to 1 year old baby</h2>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
    @endif
@endsection