@extends('layouts.app')

@section('content')
<h1>Average</h1>
        <div class="row">
            <aside class="col-sm-4">
               

                    <table class="table table-striped">
                            <tr>
                                <th>生後</th>
                                <th>Weight</th>
                                <th>Height</th>
                            </tr>
                        @foreach ($averages as $average)
                            <tr>
                                <td>{{ $average-> age_from }} 〜 {{ $average-> age_to }} 日</td>
                                <td>{{ $average->weight }}kg</td>
                                <td>{{ $average->height }}cm</td>
                                
                            </tr>
                        @endforeach
                    </table>
@endsection