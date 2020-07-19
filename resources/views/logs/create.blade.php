@extends('layouts.app')

@section('content')

    <h1>Newest</h1>
    <h2>※入力は1日1回</h2>
    <div class="row">
        <div class="col-6">
            {!! Form::model($log, ['route' => 'logs.store']) !!}


                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    {!! Form::text('weight', null, ['placeholder' => '小数点第一位まで入力（例：3.0）'], old('weight'), ['class' => 'form-control']) !!} kg
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Height') !!}
                    {!! Form::text('height', null, ['placeholder' => '小数点第一位まで入力（例：50.0）'], old('height'), ['class' => 'form-control']) !!} cm
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection