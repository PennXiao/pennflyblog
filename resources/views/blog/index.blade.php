@extends('blog.layouts.blog')

@section('title','首页')

@section('content')
  
  @foreach($bloglist as $v)
        <div class="blog-post">
          <h3 class="blog-post-title"><a href="../blog?t=Py3VZX4">{{$v->title}}</a></h3>
          <p class="blog-post-meta">{{$v->created_at}}</p>
          <blockquote>
            <p>{{$v->info}}</p> 
            <a data-show-id="{{$v->id}}">显示全部</a> 
          </blockquote>
          <p>
            <div id="editormd-view-{{$v->id}}">
                <textarea style="display:none;">
                  {{$v->markdown}} 
                </textarea>          
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
          $('[data-show-id]').click(function(){
              showId = $(this).data('show-id');
              console.log(showId);
              testEditormdView2 = editormd.markdownToHTML('editormd-view-'+showId, {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
              });
          })
          function show(id){
            testEditormdView2 = editormd.markdownToHTML('editormd-view-1', {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });
          }


        });

    </script>
    
    <link rel="stylesheet" href="//pandao.github.io/editor.md/css/editormd.preview.css" />
@endsection