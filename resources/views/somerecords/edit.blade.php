@extends('layouts.app')

@section('content')
<h1> {{ $somerecord->title }}の記録編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($somerecord, ['route' => ['somerecords.update', $somerecord->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('title', '作品:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                    {!! Form::label('ymd', '日付:') !!}
                    {!! Form::date('ymd', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
