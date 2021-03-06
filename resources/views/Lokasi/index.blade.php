@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Lokasi</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="home">Dashboard</a></li>
                <li><a class="active">Lokasi</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <p> <a class="btn btn-primary" href="{{ route('lokasi.create') }}">Tambah</a> </p>
            {!! $html->table(['class'=>'table-striped']) !!}
        </div>       
    </div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection