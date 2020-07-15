@extends('layouts.app')

@section('content')
    
    <h1>Select baby</h1>
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @if (count($babies) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($babies as $baby)
                            <tr>
                                {{-- 選択されたBabyのMypageへのリンク --}}
                                <td>{!! link_to_route('babies.show', $baby->name, ['baby' => $baby->id]) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </aside>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection