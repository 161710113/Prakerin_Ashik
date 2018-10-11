<div class="form-group{{ $errors->has('nama_mobil') ? ' has-error' : '' }}">
    {!! Form::label('nama_mobil', 'Nama Mobil', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('nama_mobil', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama_mobil', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('transmisi') ? ' has-error' : '' }}">
    {!! Form::label('transmisi', 'Transmisi', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::radio('transmisi', 'Automatic', ['class'=>'radio-control']) !!} Automatic
        {!! Form::radio('transmisi', 'Manual', ['class'=>'radio-control']) !!} Manual
        {!! $errors->first('transmisi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('bahan_bakar') ? ' has-error' : '' }}">
    {!! Form::label('bahan_bakar', 'Bahan Bakar', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::radio('bahan_bakar', 'Bensin', ['class'=>'radio-control']) !!} Bensin
        {!! Form::radio('bahan_bakar', 'Solar', ['class'=>'radio-control']) !!} Solar
        {!! $errors->first('bahan_bakar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('kilometer') ? ' has-error' : '' }}">
    {!! Form::label('kilometer', 'Kilometer', ['class'=>'col-md-2 control-label']) !!} Kilometer
    <div class="col-md-7">
        {!!  Form::number('kilometer', null, ['class'=>'form-control']) !!}
        {!! $errors->first('kilometer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('kapasitas_mesin') ? ' has-error' : '' }}">
    {!! Form::label('kapasitas_mesin', 'Kapasitas Mesin', ['class'=>'col-md-2 control-label']) !!} CC
    <div class="col-md-7">
        {!!  Form::number('kapasitas_mesin', null, ['class'=>'form-control']) !!}
        {!! $errors->first('kapasitas_mesin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('warna') ? ' has-error' : '' }}">
    {!! Form::label('warna', 'Warna', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('warna', null, ['class'=>'form-control']) !!}
        {!! $errors->first('warna', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
    {!! Form::label('harga', 'Harga &nbsp;&nbsp;&nbsp;&nbsp; Rp.', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-7">
        {!!  Form::number('harga', null, ['class'=>'form-control']) !!}
        {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
    {!! Form::label('no_hp', 'Nomor Handphone', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('no_hp', null, ['class'=>'form-control']) !!}
        {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
    {!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::textarea('deskripsi', null, ['class'=>'form-control']) !!}
        {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('id_merk') ? 'has-error' : '' !!}">
    {!! Form::label('id_merk', 'Merk', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('id_merk', [''=>'']+App\Merk::pluck('nama_merk','id')->all(), null) !!}
        {!! $errors->first('id_merk', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('id_tipe') ? 'has-error' : '' !!}">
    {!! Form::label('id_tipe', 'Tipe', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('id_tipe', [''=>'']+App\Tipe::pluck('nama_tipe','id')->all(), null) !!}
        {!! $errors->first('id_tipe', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('id_lokasi') ? 'has-error' : '' !!}">
    {!! Form::label('id_lokasi', 'Lokasi', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('id_lokasi', [''=>'']+App\Lokasi::pluck('nama_kota','id')->all(), null) !!}
        {!! $errors->first('id_lokasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('id_user') ? 'has-error' : '' !!}">
    {{-- {!! Form::label('id_user', 'Pemilik', ['class'=>'col-md-2 control-label']) !!} --}}
    <div class="col-md-8">
        <input type="hidden" name="id_user" value= "{{ Auth::user()->id }}">
        {{-- {!! Form::select('id_user', [''=>'']+App\User::pluck('name','id')->all(), null) !!} --}}
        {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
<div class="col-md-8 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>