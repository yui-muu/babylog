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
                    
                    <!--{!! Form::selectRange('from_year', 2015, 2018, '', ['placeholder' => '']) !!}年-->
                    <!--{!! Form::selectRange('from_month', 1, 12, '', ['placeholder' => '']) !!}月-->
                    <!--{!! Form::selectRange('from_day', 1, 31, '', ['placeholder' => '']) !!}日-->
                </div>

                <div class="form-group">
                    {!! Form::label('gender', 'Gender') !!}
                    {!!Form::radio('gender', 'boy')!!}
                    {!!Form::radio('gender', 'girl')!!}
                </div>

                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    <!--{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}-->
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Height') !!}
                    <!--{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}-->
                </div>

                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection