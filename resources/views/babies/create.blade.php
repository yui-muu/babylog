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
                    {!!Form::select('gender', ['Boy' => 'Boy', 'Girl' => 'Girl'], null, ['placeholder' => '性別を選択'],) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('weight', 'Birth weight') !!}
                    {!! Form::text('weight', null, ['placeholder' => '小数点第一位まで入力'], ['class' => 'form-control']) !!} kg
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Birth height') !!}
                    {!! Form::text('height', null, ['placeholder' => '小数点第一位まで入力'], ['class' => 'form-control'],) !!} cm
                </div>

                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection