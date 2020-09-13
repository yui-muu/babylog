@extends('layouts.app')

@section('content')
    
    <h1>Mypage</h1>
    <br>
        <div class="row">
            <aside class="col-sm-4">
               
                <h2>{{ $baby->name }}</h2>
                <br>
                <h3>生後{{ $num }}日</h3>
                <h3>{{ $gender }}</h3>
                <br>
                
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
                            <th>現在の月齢に当たる平均体重</th>
                            @if ($num > 365)
                            <td>---</td>
                            @elseif ($average)
                            <td>{{ $average->weight }}kg</td>
                            @endif
                        </tr>
                        <tr>
                            <th>平均との差</th>
                            @if ($num > 365)
                            <td>---</td>
                            @elseif ($average)
                                @if ($log)
                                     @if ($log->weight == null) 
                                    <td>---</td>
                                    @else
                                    <td>{{ $log->weight - $average->weight }}kg</td>
                                    @endif
                                @else
                                <td>{{ $baby->weight - $average->weight }}kg</td>
                                @endif
                            @endif
                        </tr>
                        <tr>
                            <th>１日当たりの増加量</th>
                            <td>{{ $result }}g</td>
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
                            <th>現在の月齢に当たる平均身長</th>
                            @if ($num > 365)
                            <td>---</td>
                            @elseif ($average)
                            <td>{{ $average->height }}cm</td>
                            @endif
                        </tr>
                        <tr>
                            <th>平均との差</th>
                            @if ($num > 365)
                            <td>---</td>
                            @elseif ($average)
                                @if ($log)
                                     @if ($log->height == null) 
                                    <td>---</td>
                                    @else
                                    <td>{{ $log->height - $average->height }}cm</td>
                                    @endif
                                @else
                                <td>{{ $baby->height - $average->height }}cm</td>
                                @endif
                            @endif
                        </tr>
                </table>
                {{-- 入力ページへのリンク --}}
                {!! link_to_route('logs.create', '入力', ['baby' => $baby->id], ['class' => 'btn btn-primary']) !!}
            
                <p><br>平均身長・体重・増加量はあくまでも目安☆
                <br>成長の度合いやペースには個人差があります
                <br>大切なのは赤ちゃんが元気で育つこと♪</p>
@endsection