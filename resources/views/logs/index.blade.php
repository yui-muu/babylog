@extends('layouts.app')

@section('content')

    <h1>History</h1>
        <div class="row">
            <aside class="col-sm-4">
    
                 <h2>{{ $baby->name }}</h2>

                @if (count($logs) > 0)
                    <ul class="list-unstyled">
                        @foreach ($logs as $log)
                            <div>Weight</div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Mybaby</th>
                                    <td>{{ $log->weight }}kg</td>
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
                                        <td>{{ $log->height }}cm</td>
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
                        @endforeach
                @endif

@endsection