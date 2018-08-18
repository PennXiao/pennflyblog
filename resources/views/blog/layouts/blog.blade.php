<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title> @yield('title') -飞蓬技术栈</title>
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
          <span class="label label-default">文档</span>
          <span class="label label-primary">Mysql</span>
          <span class="label label-success">Python</span>
          <span class="label label-info">更新</span>
          <span class="label label-warning">开发</span>
          @foreach($tagcloud as $tag)
          <span class="label label-default">{{$tag->name}}</span>
          @endforeach
        </div>
        <div class="sidebar-module">
          <h4>历史</h4>
          <ol class="list-unstyled">
            <li><a href="#">时间线</a></li>
          </ol>
        </div>
        <div class="sidebar-module">
          <h4>关注</h4>
          <ol class="list-unstyled">
            <li><a href="https://github.com/PennXiao">GitHub</a></li>
            <li><a href="#">公众号</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"> &copy;{{date('Y')}} Pennfly, Cloud.</p>
      </div>
    </footer>

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    @yield('bottom')

  </body>
</html>


<style type="text/css">

/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}

body{
  font-family: -apple-system,BlinkMacSystemFont,Helvetica Neue,PingFang SC,Microsoft YaHei,Source Han Sans SC,Noto Sans CJK SC,WenQuanYi Micro Hei,sans-serif;
  font-size: 15px;
  -webkit-tap-highlight-color: rgba(26,26,26,0);
  margin-bottom: 60px;
}

.important { color: #336699; }

.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  /*height: 60px;*/
  background-color: #f6f6f6;
  text-align: center;
  border-top: 1px solid #e5e5e5;

}


/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

body > .container {
  padding: 60px 15px 0;
}
.container .text-muted {
  margin: 20px 0;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

code {
  font-size: 80%;
}


/* Sidebar modules for boxing content */
.sidebar-module {
  padding: 15px;
  margin: 0 -15px 15px;
}
.sidebar-module-inset {
  padding: 15px;
  background-color: #f5f5f5;
  border-radius: 4px;
}
.sidebar-module-inset p:last-child,
.sidebar-module-inset ul:last-child,
.sidebar-module-inset ol:last-child {
  margin-bottom: 0;
}
.sidebar-module-inset span{line-height: 25px;}

/* Pagination */
.pager {
  margin-bottom: 60px;
  text-align: left;
}
.pager > li > a {
  width: 140px;
  padding: 10px 20px;
  text-align: center;
  border-radius: 30px;
}


/*
 * Blog posts
 */

.blog-post {
  margin-bottom: 60px;
}
.blog-post-title {
  margin-bottom: 5px;
  font-size: 22px;
}
.blog-post-meta {
  margin-bottom: 20px;
  color: #999;
}


/*
 * Blog name and description
 */

.blog-header {
  padding-top: 20px;
  padding-bottom: 20px;
}
.blog-title {
  margin-top: 30px;
  margin-bottom: 0;
  font-size: 60px;
  font-weight: normal;
}
.blog-description {
  font-size: 20px;
  color: #999;
}
</style>