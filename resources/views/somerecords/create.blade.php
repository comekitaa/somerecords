@extends('layouts.app')

@section('content')

    <h1>新規投稿</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($somerecord, ['route' => 'somerecords.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', '作品:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                    {!! Form::label('ymd', '日付:') !!}
                    {!! Form::date('ymd', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection