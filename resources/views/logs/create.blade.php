@extends('layouts.app')

@section('content')

    <h1>Newest</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($log, ['route' => 'logs.store']) !!}


                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    {!! Form::text('weight', null, ['placeholder' => '小数点第一位まで入力'], old('weight'), ['class' => 'form-control']) !!} kg
                </div>
                
                <div class="form-group">
                    {!! Form::label('height', 'Height') !!}
                    {!! Form::text('height', null, ['placeholder' => '小数点第一位まで入力'], old('height'), ['class' => 'form-control']) !!} cm
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
    <br>
    <h3>※入力は1日1回☆
    <br>&emsp;編集はHistoryページへ♪</h3>
        </div>
    </div>
@endsection