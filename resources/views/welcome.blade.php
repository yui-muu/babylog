@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
            <p class="center"></p>
            <div class="text-center">
                <h1>Welcome to the BABY LOG</h1>
                <h2>Growth record up to 1 year old baby!!</h2>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
    @endif
@endsection