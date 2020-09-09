@extends('layouts.app')

@section('content')
<h1>Average</h1>
    <br>
        <div class="row">
            <aside class="col-lg-6 col-sm-4">
               
                    <h2>Boy</h2>
                    <table class="table table-striped">
                            <tr>
                                <th>生後</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>1日の体重増加目安</th>
                            </tr>
                        @foreach ($boyAverages as $boyAverage)
                            <tr>
                                <td>{{ $boyAverage-> age_from }} 〜 {{ $boyAverage-> age_to }} 日</td>
                                <td>{{ $boyAverage->weight }}kg</td>
                                <td>{{ $boyAverage->height }}cm</td>
                                <td align="center">{{ $boyAverage->perday }}g</td>
                                
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <h2>Girl</h2>
                    <table class="table table-striped">
                            <tr>
                                <th>生後</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>1日の体重増加目安</th>
                            </tr>
                        @foreach ($girlAverages as $girlAverage)
                            <tr>
                                <td>{{ $girlAverage-> age_from }} 〜 {{ $girlAverage-> age_to }} 日</td>
                                <td>{{ $girlAverage->weight }}kg</td>
                                <td>{{ $girlAverage->height }}cm</td>
                                <td align="center">{{ $girlAverage->perday }}g</td>
                                
                            </tr>
                        @endforeach
                    </table>
@endsection