@extends('layouts.app')

@section('content')

    <h1>History</h1>
        <div class="row">
            <aside class="col-sm-4">
    
                 <h2>{{ $baby->name }}</h2>

                @if (count($logs) > 0)
                    <ul class="list-unstyled">
                        @foreach ($logs as $log)
                        
                            <div>{{ $log->created_at->format('Y-m-d') }}</div>
                            <div>Weight</div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Mybaby</th>
                                    <td>{{ $log->weight }}kg</td>
                                </tr>
                                <tr>
                                    <th>平均体重</th>
                                    <td>{{ $average->weight }}kg</td>
                                </tr>
                                <tr>
                                    <th>平均との差</th>
                                    @if ($log->weight == null) 
                                    <td>---</td>
                                    @else
                                    <td>{{ $log->weight - $average->weight }}g</td>
                                    @endif
                                </tr>
                            </table>
                            
                            <div>Height</div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Mybaby</th>
                                    <td>{{ $log->height }}cm</td>
                                </tr>
                                <tr>
                                    <th>平均身長</th>
                                    <td>{{ $average->height }}cm</td>
                                </tr>
                                <tr>
                                    <th>平均との差</th>
                                    @if ($log->height == null) 
                                    <td>---</td>
                                    @else
                                    <td>{{ $log->height - $average->height }}cm</td>
                                    @endif
                                </tr>
                            </table>
                            {{-- log編集ページへのリンク --}}
                            {!! link_to_route('logs.edit', '編集', ['baby' => $log->baby_id, 'log' => $log->id], ['class' => 'btn btn-success']) !!}
                            {{-- log削除フォーム --}}
                            {!! Form::model($log, ['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endforeach
                @endif

@endsection