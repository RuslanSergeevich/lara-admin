<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Навигация</li>

                <li class="treeview">
                    <a href="{{ url('/admin/pages') }}">
                        <i class="fa fa-files-o"></i> <span>Страницы</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/articles') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i> <span>Cтатьи</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/news') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i> <span>Новости</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/comments') }}">
                        <i class="fa fa-fw fa-users"></i> <span>Отзывы</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/galery') }}">
                        <i class="fa fa-fw fa-picture-o"></i> <span>Галерея</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0b
        </div>
        <strong>Copyright &copy; {{ date('Y') }}</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
