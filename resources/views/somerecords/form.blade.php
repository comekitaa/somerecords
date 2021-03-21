<div class="row">
    <div class="col-6">
    {!! Form::open(['route' => 'somerecords.store']) !!}
        <div class="form-group">
            {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '1']) !!}
            {!! Form::textarea('memo', old('ymd'), ['class' => 'form-control', 'rows' => '2']) !!}
            {!! Form::textarea('ymd', old('ymd'), ['class' => 'form-control', 'rows' => '1']) !!}
            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
    </div>
</div>