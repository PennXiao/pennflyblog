@extends('admin.layouts.admin')

@section('content')
 
  <h2 class="sub-header">博客导航列表</h2>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>名称</th>
        <th>Url</th>
        <th>排序</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($navList as $key=>$value)
      <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->url}}</td>
        <td>{{$value->sequence}}</td>
        <td> <a href="javascript:void(0)" onclick="$('#navModal').modal('show')">编辑</a>  </td>
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
        
        <form id="addNavPost" method="post" action="{{route('admin.navPost')}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for="recipient-name" class="control-label">名称:</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Url:</label>
            <input type="text" name="url" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">排序:</label>
            <input type="text" name="sequence" class="form-control">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">描述:</label>
            <textarea class="form-control" id="message-text"></textarea>
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
  
})
</script>
@endsection