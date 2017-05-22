
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Realestate Bootstrap Theme </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/script.js"></script>



    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <script src="assets/owl-carousel/owl.carousel.js"></script>
    <!-- Owl stylesheet -->


    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
    <!-- slitslider -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">

                <ul class="nav navbar-nav navbar-left">
                    @if(!empty($settings->phone1))<li><a href="tel:{{ $settings->phone1 }}"><span class="glyphicon glyphicon-earphone"></span> {{ $settings->phone1 }} </a></li>@endif
                    @if(!empty($settings->phone2))<li><a href="tel:{{ $settings->phone2 }}"><span class="glyphicon glyphicon-earphone"></span> {{ $settings->phone2 }} </a></li>@endif
                    @if(!empty($settings->email))<li><a href="mailto:{{ $settings->email }}"><span class="glyphicon glyphicon-envelope"></span> {{ $settings->email }} </a></li>@endif
                    @if(!empty($settings->email2))<li><a href="mailto:{{ $settings->email2 }}"><span class="glyphicon glyphicon-envelope"></span> {{ $settings->email2 }} </a></li>@endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @foreach($top_menu as $item)
                        @if($item->children->count() > 0)
                            <li class="dropdown">
                                <a href="@if($item->url=='/')/@else/{{$item->url}}@endif" class="dropdown-toggle">
                                    {{$item->name}}<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($item->children as $submenu)
                                        <li><a href="/{{$submenu->url}}">{{$submenu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="@if($item->url=='/')/@else/{{$item->url}}@endif">{{$item->name}}</a></li>
                        @endif
                    @endforeach
                </ul>

            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="/"><img src="images/logo.png" alt="Realestate"></a>

        <ul class="pull-right">
            <li><a href="buysalerent.php">Buy</a></li>
            <li><a href="buysalerent.php">Sale</a></li>
            <li><a href="buysalerent.php">Rent</a></li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>

    @yield('content')

<div class="footer">

    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Информация</h4>
                <ul class="row">
                    @foreach($footer_menu as $menu)
                        <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/{{ $menu->url }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>
                <form class="form-inline" role="form">
                    <input type="text" placeholder="Enter Your email address" class="form-control">
                    <button class="btn btn-success" type="button">Notify Me!</button></form>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Мы в соц. сетях</h4>
                <a href="#"><img src="images/facebook.png" alt="facebook"></a>
                <a href="#"><img src="images/twitter.png" alt="twitter"></a>
                <a href="#"><img src="images/linkedin.png" alt="linkedin"></a>
                <a href="#"><img src="images/instagram.png" alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
            </div>
        </div>
        @if(!empty($settings->copyright))<p class="copyright">{{ $settings->copyright }}</p>@endif
    </div></div>

<!-- Modal -->
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>
                    <form class="" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
</body>
</html>