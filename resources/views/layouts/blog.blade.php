<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 
    <title> @yield('title')</title>

    <!-- 解析markdown -->
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//pandao.github.io/editor.md/css/editormd.preview.css"/>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">飞蓬技术栈</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">飞蓬技术栈</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            @foreach($navigation as $navUrl)
              <li class="pure-menu-item"><a href="{{$navUrl->url}}" class="pure-menu-link">{{$navUrl->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">

      <div class="col-sm-8">
         @yield('content')
      </div>

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar" id="custom-toc-container">
        <div class="sidebar-module sidebar-module-inset">
          <h4>标签</h4>
          @foreach($tagcloud as $tag)
          <span class="label label-default">{{$tag->name}}</span>
          @endforeach
        </div>
        <div class="sidebar-module">
          <h4>历史</h4>
          <ol class="list-unstyled">
            <!-- <li><a href="#">时间线</a></li> -->
          </ol>
        </div>
        <div class="sidebar-module">
          <h4>关注</h4>
          <ol class="list-unstyled">
            <li><a href="https://github.com/PennXiao" target="_blank">GitHub</a></li>
            <li><a href="https://mp.weixin.qq.com/" target="_blank">公众号</a></li>
            <li><a href="https://fb.com/pennfly" target="_blank">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">
        <small>

          &copy; 2015-{{date('Y')}} Pennfly. 
          Mail : <a href="Mailto:pennilessfor@gmail.com" target="_blank">pennilessfor@gmail.com</a>.
          网站备案号 : <a href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备18013729号</a>.
        
        </small>
        </p>
      </div>
    </footer>

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    @yield('bottom')

  </body>
</html>