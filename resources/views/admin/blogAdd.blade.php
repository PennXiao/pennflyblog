@extends('admin.layouts.admin')

@section('content')
    <form method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label>文章标题</label>
        <input type="text" class="form-control" name="title" placeholder="响亮的标题">
      </div>
      <div class="form-group">
        <label>文章简介</label> 
        <textarea class="form-control" name="info" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">MD编辑器</label>
        <div id="blogmd">
            <textarea style="display:none;">
            </textarea>
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
              var md = '-- Start . ';
              var testEditor = editormd("blogmd", {
                  width  : "100%",
                  height : 640,
                  path   : "//pandao.github.io/editor.md/lib/",
                  appendMarkdown : md,
                  saveHTMLToTextarea : true,
                  emoji : false,
                  taskList : true,
                  tocm            : true,         // Using [TOCM]
                  tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                  flowChart : true,             // 开启流程图支持，默认关闭
                  sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
              });
      });



      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
      })
  </script>
@endsection