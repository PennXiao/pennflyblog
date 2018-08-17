@extends('admin.layouts.admin')

@section('content')
 
  <h2 class="sub-header">博客内容列表</h2>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>标题</th>
        <th>更新</th>
        <th>创造</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($blogList as $key=>$value)
      <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->title}}</td>
        <td>{{$value->updated_at}}</td>
        <td>{{$value->created_at}}</td>
        <td> <a href="{{route('admin.blogAdd',['id'=>$value->id])}}">编辑</a>  </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
@endsection