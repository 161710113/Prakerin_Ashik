<div class="form-group{{ $errors->has('nama_kota') ? ' has-error' : '' }}">
    {!! Form::label('nama_kota', 'Nama Kota', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('nama_kota', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama_kota', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>