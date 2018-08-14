<?php

namespace App\Http\Controllers\Blog;

use App\Blog\Blog;
use App\Blog\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * 网站导航栏Nav.
     *
     * @return \Illuminate\Http\Response
     */
    public function navList()
    {
        $navigation = Navigation::paginate(config('app.paginate',20));
        return view('admin.navList',['navList'=>$navigation]);
    }


    /**
     * 新增编辑网站nav导航
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function navPost(Request $request)
    {
        if ($request->input('id',false)) {
            $navigation = Navigation::find($request->input('id'));
        }else{
            $navigation = new Navigation();
        }
        $navigation->name = $request->input('name','未知列');
        $navigation->url = $request->input('url','blog');
        $navigation->sequence = $request->input('sequence',99);
        $navigation->save();
        return back()->withInput();
    }

    /**
     * 显示博客列表
     * @return \Illuminate\Http\Response
     */
    public function blogList()
    {  
        $blog = Blog::get()->paginate(config('app.paginate',15));
        return view('admin.blogList',['blogList'=>$blog]);
    }

    /**
     * 新增编辑文章
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogPost(Request $request)
    { 
        if ($request->input('id',false)) {
            $navigation = Blog::find($request->input('id'));
        }else{
            $navigation = new Blog();
        } 
        $navigation->title = $request->input('title');
        $navigation->info = $request->input('info');
        $navigation->html = $request->input('blogmd-html-code');
        $navigation->markdown = $request->input('editormd-markdown-textarea'); 
        $navigation->save();
        return back()->withInput();
    }

    /**
     * 显示标签列表
     * @return \Illuminate\Http\Response
     */
    public function tagList()
    {  
        $blog = Blog::get()->paginate(config('app.paginate',15));
        return view('admin.tagList',['blogList'=>$blog]);
    }

    /**
     * 新增编辑标签
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tagPost(Request $request)
    { 
        if ($request->input('id',false)) {
            $navigation = Blog::find($request->input('id'));
        }else{
            $navigation = new Blog();
        } 
        $navigation->title = $request->input('title');
        $navigation->info = $request->input('info');
        $navigation->html = $request->input('html');
        $navigation->markdown = $request->input('markdown'); 
        $navigation->save();
        return back()->withInput();
    }

}
