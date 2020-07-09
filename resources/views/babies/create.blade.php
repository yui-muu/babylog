@extends('layouts.app')

@section('content')

    <h1>Register</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($baby, ['route' => 'babies.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('birthday', 'Birthday') !!}
                    {!! Form::date('birthday', old('birthday')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('gender', 'Gender') !!}
                    {!!Form::select('gender', ['B' => 'Boy', 'G' => 'Girl'], null, ['placeholder' => '性別を選択'],) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    {!! Form::text('Birth weight', null, ['placeholder' => '小数点第一位まで入力（例：3.0）'], ['class' => 'form-control']) !!} kg
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Height') !!}
                    {!! Form::text('Birth height', null, ['placeholder' => '小数点第一位まで入力（例：50.0）'], ['class' => 'form-control'],) !!} cm
                </div>

                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection