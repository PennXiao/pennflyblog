@extends('blog.layouts.blog')

@section('title','首页')

@section('content')
  
  @foreach($bloglist as $v)
        <div class="blog-post">
          <h3 class="blog-post-title"><a href="/blog/{{$v->id}}">{{$v->title}}</a></h3>
          <p class="blog-post-meta">{{$v->created_at}}</p>
          <blockquote>
            <p>{{$v->info}}</p> 
            <a data-show-id="{{$v->id}}">显示全部</a>
            <a class="hide" data-hide-id="{{$v->id}}">收起</a>
          </blockquote>
          <p>
            <div id="editormd-view-{{$v->id}}">        
            </div> 
          </p>
        </div>
  @endforeach

{{$bloglist->links()}}

@endsection

@section('bottom')
    <script src="//pandao.github.io/editor.md/lib/marked.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/prettify.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/raphael.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/underscore.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/sequence-diagram.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/flowchart.min.js"></script>
    <script src="//pandao.github.io/editor.md/lib/jquery.flowchart.min.js"></script>

    <script src="//pandao.github.io/editor.md/editormd.js"></script>
    <script type="text/javascript">
        $(function() {

          //直接快速阅读文章
          $('[data-show-id]').click(function(){
              var testEditormdView, showId = $(this).data('show-id'); 
              $("a[data-hide-id='"+showId+"']").toggleClass('hide');
              $(this).toggleClass('hide');
              $.get("/getMd/"+showId, function(markdown) {
                testEditormdView = editormd.markdownToHTML('editormd-view-'+showId, {
                      markdown        : markdown ,
                      htmlDecode      : "style,script,iframe", 
                      tocm            : true,
                      emoji           : true,
                      taskList        : true,
                      tex             : true,  // 默认不解析
                      flowChart       : true,  // 默认不解析
                      sequenceDiagram : true,  // 默认不解析
                });
              }); 
          })

          //显示收起切换
          $('[data-hide-id]').click(function(){
            var showId = $(this).data('hide-id'); 
            $("a[data-show-id='"+showId+"']").toggleClass('hide');
            $("#editormd-view-"+showId).html('');
            $(this).toggleClass('hide');
          });

        });

    </script>
    
    <link rel="stylesheet" href="//pandao.github.io/editor.md/css/editormd.preview.css" />
@endsection