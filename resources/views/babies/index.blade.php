@extends('layouts.app')

@section('content')

    <h1>Select baby</h1>
    
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
                    <td>{{ $baby->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection