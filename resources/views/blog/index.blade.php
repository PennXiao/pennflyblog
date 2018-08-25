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
          </blockquote>
          <p>
            <div class="hide" id="editormd-view-{{$v->id}}">
              {!! $v->html !!}
              <a data-hide-id="{{$v->id}}">收起</a>
            </div>
            
          </p>
        </div>
  @endforeach

  {{$bloglist->links()}}

@endsection

@section('bottom')
    <script type="text/javascript">
        $(function() {
          //设置文章内容隐藏和显示
          $('[data-show-id]').click(function(){
            var showId = $(this).data('show-id');
            $("#editormd-view-"+showId).toggleClass('hide');
            $(this).text('收起全部');
          });
          $('[data-hide-id]').click(function(){
            var showId = $(this).data('hide-id');
            $("#editormd-view-"+showId).toggleClass('hide');
            $("[data-show-id='"+showId+"']").text('显示全部');
          });

        });
    </script>
@endsection