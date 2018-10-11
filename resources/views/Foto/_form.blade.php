<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
    {!! Form::label('foto', 'Foto', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::file('foto' , ['name'=>'foto[]','class'=>'validate','accept'=>'image/*','multiple']) !!}        
        @if (isset($foto) && $foto->foto)
        <p>
        {!! Html::image(asset('img/galeri/'.$foto->foto), null, ['class'=>'img-rounded img-responsive']) !!}
        </p>
        @endif
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('id_mobil') ? 'has-error' : '' !!}">
    {!! Form::label('id_mobil', 'Mobil', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('id_mobil', [''=>'']+App\Mobil::pluck('nama_mobil','id')->all(), null) !!}
        {!! $errors->first('id_mobil', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
<div class="col-md-8 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>