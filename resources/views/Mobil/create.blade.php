@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Mobil</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="home">Dashboard</a></li>
                <li><a href="{{route ('mobil.index')}}">Mobil</a></li>
                <li><a class="active">Tambah Mobil</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="panel panel-default">
            <div class="panel-heading">
            <h2 class="panel-title">Tambah Mobil</h2>
    </div>
    
    <div class="panel-body">
        <div class="white-box">            
                {!! Form::open(['url' => route('mobil.store'),'method' => 'post','class'=>'form-horizontal form-material','enctype'=>'multipart/form-data']) !!}
                @csrf
                @include('Mobil._form')
                {!! Form::close() !!}            
        </div>
    </div>
@endsection