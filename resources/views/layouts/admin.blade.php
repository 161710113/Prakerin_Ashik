<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/Admin/plugins/images/favicon.png') }}">
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/Admin/html/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('assets/Admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('assets/Admin/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('assets/Admin/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('assets/Admin/html/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/Admin/html/css/style.css') }}" rel="stylesheet">
    <!-- DataTable -->
    <link href="{{ asset('assets/DataTables/DataTable/css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/DataTables/DataTable/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('assets/Admin/html/css/colors/blue-dark.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <div id="wrapper">
    
        @include('master.nav-desk-admin')
        
        @include('master.sidebar-admin')

        <div id="page-wrapper">
            <div class="container-fluid">
                @include('layouts._flash')
                @yield('content')
            </div>
            <footer class="footer text-center"> 2018 &copy; Dashboard Admin Second Cars </footer>
        </div>

    </div>



    <!-- /#wrapper -->    
    <!-- jQuery -->
    <script src="{{ asset('assets/Admin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/Admin/html/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('assets/Admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('assets/Admin/html/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/Admin/html/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('assets/Admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!--Morris JavaScript -->
    {{-- <script src="{{ asset('assets/Admin/plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/Admin/plugins/bower_components/morrisjs/morris.js') }}"></script> --}}
    <!-- DataTable -->
    <script src="{{ asset('assets/DataTables/DataTable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/DataTable/js/dataTables.bootstrap.min.js') }}"></script>    
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/Admin/html/js/custom.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/Admin/html/js/dashboard1.js') }}"></script> --}}
    <script src="{{ asset('assets/Admin/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>    
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    @yield('scripts')
</body>

</html>
