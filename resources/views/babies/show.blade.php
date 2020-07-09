@extends('layouts.app')

@section('content')
    
    
    <h1>Mypage</h1>
        <div class="row">
            <aside class="col-sm-4">
               
                <h2>{{ $baby->name }}</h2>
                
                
                <div>Weight</div>
                <table class="table table-striped">
                        <tr>
                            <th>Mybaby</th>
                            @if ($log)
                            <td>{{ $log->weight }}kg</td>
                            @else
                            <td>{{ $baby->weight }}kg</td>
                            @endif
                        </tr>
                        <tr>
                            <th>平均体重</th>
                            <td>kg</td>
                        </tr>
                        <tr>
                            <th>平均との差</th>
                            <td>kg</td>
                        </tr>
                        <tr>
                            <th>１日当たりの増加量</th>
                            <td>g</td>
                        </tr>
                </table>
                
                <div>Height</div>
                <table class="table table-striped">
                        <tr>
                            <th>Mybaby</th>
                            @if ($log)
                            <td>{{ $log->height }}cm</td>
                            @else
                            <td>{{ $baby->height }}cm</td>
                            @endif
                        </tr>
                        <tr>
                            <th>平均身長</th>
                            <td>cm</td>
                        </tr>
                        <tr>
                            <th>平均との差</th>
                            <td>cm</td>
                        </tr>
                </table>
                {{-- 入力ページへのリンク --}}
                {!! link_to_route('logs.create', '入力', [], ['class' => 'btn btn-primary']) !!}

    
@endsection
