@extends('admin.layouts.admin')

@section('content')
    <form action="{{route('admin.blogPost')}}" method="post" >
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    @if(isset($data->id))<input type="hidden" name="id" value="{{$data->id}}">@endif

      <div class="form-group">
        <label>文章标题</label>
        <input type="text" class="form-control" value="{{$data->title or ''}}" name="title" placeholder="响亮的标题">
      </div>
      <div class="form-group">
        <label>文章简介</label> 
        <textarea class="form-control" name="info" rows="3">{{$data->info or ''}}</textarea>
      </div>
      <div class="form-group">
        <label>MD编辑器</label>
        <div id="blogmd">
            <textarea style="display:none;">{{$data->markdown or '-- Start . '}}</textarea>
        </div>
      </div>
      <button type="input"  class="btn btn-default" id="submit">Submit</button>

    </form>

@endsection

@section('bottom') 
  <link rel="stylesheet" href="//pandao.github.io/editor.md/css/editormd.css" /> 
  <script src="//pandao.github.io/editor.md/editormd.js"></script>
  <script type="text/javascript">
      $(function() {
              var testEditor = editormd("blogmd", {
                  width  : "100%",
                  height : 640,
                  path   : "//pandao.github.io/editor.md/lib/",
                  // appendMarkdown : md,
                  saveHTMLToTextarea : true,
                  emoji : false,
                  taskList : true,
                  tocm            : true,         // Using [TOCM]
                  tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                  flowChart : true,             // 开启流程图支持，默认关闭
                  sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
              });
      });

  </script>
@endsection