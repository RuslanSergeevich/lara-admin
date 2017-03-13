<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{ config('app.site_name_short') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{ config('app.site_name') }}</span>
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
                    <a href="{{ url('/admin/menu') }}">
                        <i class="fa fa-fw fa-dropbox"></i> <span>Меню сайта</span>
                    </a>
                </li>
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
                    <a href="{{ url('/admin/gallery') }}">
                        <i class="fa fa-fw fa-picture-o"></i> <span>Галерея</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/boxes') }}">
                        <i class="fa fa-fw fa-dropbox"></i> <span>Блоки сайта</span>
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
<script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('js/jquery.liTranslit.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script>
    $(document).ready(function() {
        $(".submit_image_tags").click(function() {
                var img_id =  $(this).closest('form').find('input[type=hidden][name=id]').val();
                var alt = $(this).closest('form').find('input[type=text][name=alt]').val();
                var title = $(this).closest('form').find('input[type=text][name=title]').val();
                var published = $(this).closest('form').find('input:checked').val();
                $.ajax({
                    type: "POST",
                    url: "/admin/gallery/edit_image",
                    data: {'img_id':img_id, 'alt':alt, 'title':title, 'published':published, '_token':"{{csrf_token()}}" },
                    success: function(msg){
                       
                    }
                });
                return false;
        });
    });
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
    $(function(){
        $('.translit').liTranslit();
    });
    CKEDITOR.replace( 'text' );
    CKEDITOR.replace( 'small_text' );
</script>
</body>
</html>
