@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a class="active">Dashboard</a></li>
            </ol>
        </div>        
    </div>    
<h1><b><center>Selamat Datang Di Dashboard Admin Second Cars</center></b></h1>

@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Dashnoard Second Cars',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
</script>