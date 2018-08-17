@extends('admin.layouts.admin')

@section('content')
 
  <!-- <h3>内容标签Mark</h3> -->
  <h4 class="sub-header">BlogMark</h4>
  <div class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-default" data-editId="0">新增</button>
    <button type="button" class="btn btn-default">Middle</button>
    <button type="button" class="btn btn-default">Right</button>
  </div>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>名称</th>
        <th>热度</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($tagList as $key=>$value)
      <tr>
        <td>{{$value->id}}</td>
        <td data-nav-name="{{$value->id}}">{{$value->name}}</td>
        <td data-nav-url="{{$value->id}}">{{$value->hot}}</td>
        <td data-nav-sequence="{{$value->id}}">{{$value->sequence}}</td>
        <td> <a data-editId="{{$value->id}}">编辑</a>  </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
@endsection

@section('bottom') 
<div class="modal fade" id="navModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑</h4>
      </div>
      <div class="modal-body">
        <p>
        
        <form id="addNavPost" method="post" action="{{route('admin.tagPost')}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for="recipient-name" class="control-label">名称:</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">热度:</label>
            <input type="text" name="hot" class="form-control" id="hot">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">排序:</label>
            <input type="text" name="sequence" class="form-control" id="sequence">
          </div> 
        </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#addNavPost').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("[data-editId]").click(function(){
    var navId = $(this).attr('data-editId');
    if(navId)
      $("#name").val($("[data-nav-name='"+navId+"']").text());
      $("#hot").val($("[data-nav-url='"+navId+"']").text());
      $("#sequence").val($("[data-nav-Sequence='"+navId+"']").text());
      $("#addNavPost").append('<input type="hidden" name="id" value="'+navId+'">');
    $('#navModal').modal('show')
  });
})
</script>
@endsection