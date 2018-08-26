@extends('layouts.blog')

@section('title',$data->title)

@section('content')
    <h1 class="sub-header"> {{$data->title}}</h1>
    <h5 class="sub-header"> {{$data->created_at}}</h5>
    <div id="test-editormd-view">
        <textarea id="append-test" style="display:none;">{{$data->markdown}}</textarea>          
    </div>


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
          testEditormdView = editormd.markdownToHTML("test-editormd-view", {
              htmlDecode      : "style,script,iframe",  // you can filter tags decode
              tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
              emoji           : true,
              taskList        : true,
              tex             : true,  // 默认不解析
              flowChart       : true,  // 默认不解析
              sequenceDiagram : true,  // 默认不解析
          });
        });
    </script>
    <link rel="stylesheet" href="//pandao.github.io/editor.md/css/editormd.preview.css" />

@endsection
