<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | Shop BKAN</title>
  <!-- <meta name="description" content="@yield('description')"> -->

  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  @yield('styles')

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <!-- Facebook plugin -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1378114542518458";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div class="page-header">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Shop BKAN</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
            <li><a href="/products">Sản phẩm mới</a></li>
            <li><a href="/blog">Blog</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/orders"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span class="badge">{!! count(\Session::get('cart')) !!}</span></a>
            </li>
            @if (Auth::guest())
              <li><a href="/auth/login">Đăng nhập</a></li>
              <li><a href="/auth/register">Đăng ký</a></li>
            @else
              <li class="dropdown">
                <a href="#" title="{{ Auth::user()->name }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ str_limit( Auth::user()->name, $limit = 10, $end = '...') }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/profile/{{ Auth::user()->id }}">Thông tin</a></li>
                  <li><a href="/auth/logout">Đăng xuất</a></li>
                </ul>
              </li>
            @endif
          </ul>

          <form role="form" method="GET" action="{{ url('/search') }}">
            <div class="row">
              <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Nhập tìm kiếm...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <div class="container">
    @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
    @endif
    
    @if ($errors->any())
      <div class='alert alert-danger'>
        @foreach ( $errors->all() as $error )
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
  </div>
  
  @yield('content')

  <div class="footer">
    <nav class="navbar navbar-default navbar-static-bottom">
      <div class="container">
        <h5 id="brand-footer">
          © Copyright 2015 - Shop BKAN
        </h5>
      </div>
    </nav>
  </div>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  @yield('scripts')
</body>
</html>
