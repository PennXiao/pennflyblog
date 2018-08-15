@extends('blog.layouts.blog')

@section('title','首页')

@section('content')

            <div id="test-editormd-view2">
                <textarea id="append-test" style="display:none;">
                    {{data.md_doc}}
				        </textarea>          
            </div>




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
          // var testEditormdView, testEditormdView2;
            
          // $.get("test.md", function(markdown) {
                
			    // testEditormdView = editormd.markdownToHTML("test-editormd-view", {
          //           markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
          //           //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
          //           htmlDecode      : "style,script,iframe",  // you can filter tags decode
          //           //toc             : false,
          //           tocm            : true,    // Using [TOCM]
          //           //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
          //           //gfm             : false,
          //           //tocDropdown     : true,
          //           // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
          //           emoji           : true,
          //           taskList        : true,
          //           tex             : true,  // 默认不解析
          //           flowChart       : true,  // 默认不解析
          //           sequenceDiagram : true,  // 默认不解析
          //       });
          //   });
                
            testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
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
