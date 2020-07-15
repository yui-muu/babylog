@extends('layouts.app')

@section('content')

    <h1>編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($log, ['route' => ['logs.update', $log->id], 'method' => 'put']) !!}


                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    {!! Form::text('weight', null, ['placeholder' => '小数点第一位まで入力（例：3.0）'], old('weight'), ['class' => 'form-control']) !!} kg
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Height') !!}
                    {!! Form::text('height', null, ['placeholder' => '小数点第一位まで入力（例：50.0）'], old('height'), ['class' => 'form-control']) !!} cm
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection