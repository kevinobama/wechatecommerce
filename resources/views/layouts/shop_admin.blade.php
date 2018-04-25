<!DOCTYPE html>
<html>
@include('layouts.partials.admin.head')
<body class="hold-transition skin-blue sidebar-open  sidebar-mini">
<div class="wrapper">
    @include('layouts.partials.admin.mainheader')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
    @include('layouts.partials.admin.sidebar')
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section> -->
        @if(Session::has('flash_message'))
            <p class="alert alert-danger">{{ Session::get('flash_message') }}</p>
        @endif

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('layouts.partials.admin.footerjs')
</body>
</html>