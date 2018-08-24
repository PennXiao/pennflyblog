<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') Blog 后台管理系统</title>
    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="//v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="//v3.bootcss.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="//v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
    body{padding-top:50px}
    .sub-header{padding-bottom:10px;border-bottom:1px solid #eee}
    .navbar-fixed-top{border:0}.sidebar{display:none}
    @media(min-width:768px){
      .sidebar{position:fixed;top:51px;bottom:0;left:0;z-index:1000;display:block;padding:20px;overflow-x:hidden;overflow-y:auto;background-color:#f5f5f5;border-right:1px solid #eee}
    }
    .nav-sidebar{margin-right:-21px;margin-bottom:20px;margin-left:-20px}
    .nav-sidebar>li>a{padding-right:20px;padding-left:20px}.nav-sidebar>.active>a,
    .nav-sidebar>.active>a:hover,.nav-sidebar>.active>a:focus{color:#fff;background-color:#428bca}
    .main{padding:20px}@media(min-width:768px){.main{padding-right:40px;padding-left:40px}}
    .main .page-header{margin-top:0}.placeholders{margin-bottom:30px;text-align:center}.placeholders h4{margin-bottom:0}
    .placeholder{margin-bottom:20px}.placeholder img{display:inline-block;border-radius:50%}
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Blog 后台管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="#">仪表盘</a></li> -->
            <li><a href="#">设置</a></li>
            <!-- <li><a href="#">资料</a></li> -->
            <li><a href="{{ route('logout') }}">退出</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li @if(URL::current() == route('admin.index')) class="active" @endif>
              <a href="{{route('admin.index')}}">概览</a>
            </li> 
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="">列表</a></li>
            <li><a href="">表单</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          
          <ul class="nav nav-sidebar">
            <li @if(URL::current() == route('admin.nav')) class="active" @endif >
              <a href="{{route('admin.nav')}}">栏目</a>
            </li>

            <li @if(URL::current() == route('admin.blog')) class="active" @endif >
              <a href="{{route('admin.blog')}}">笔记</a>
            </li>

            <li @if(URL::current() == route('admin.blogAdd')) class="active" @endif >
              <a href="{{route('admin.blogAdd')}}">写笔记</a>
            </li>

            <li @if(URL::current() == route('admin.tag')) class="active" @endif >
              <a href="{{route('admin.tag')}}">标签</a>
            </li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="//v3.bootcss.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="//v3.bootcss.com/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="//v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    @yield('bottom')
  </body>
</html>