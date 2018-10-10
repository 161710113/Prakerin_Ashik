<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
    {!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
    {!! Form::label('isi', 'Isi', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::textarea('isi', null, ['class'=>'form-control']) !!}
        {!! $errors->first('isi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('sampul') ? ' has-error' : '' }}">
    {!! Form::label('sampul', 'Foto Sampul', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::file('sampul', null, ['class'=>'form-control']) !!}
        @if (isset($berita) && $berita->sampul)
            <p>
                {!! Html::image(asset('img/berita/'.$berita->sampul), null, ['class'=>'img-rounded img-responsive']) !!}
            </p>
        @endif
        {!! $errors->first('sampul', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>