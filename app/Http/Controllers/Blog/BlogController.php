<?php

namespace App\Http\Controllers\Blog;

use App\Blog\Navigation;
use App\Blog\Tagcloud; 
use App\Blog\Blog;


use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    
    function __construct(){
        View::share('navigation', Navigation::get());#网页导航
        View::share('tagcloud', Tagcloud::get());#云标签
        parent::__construct();
    }

    //笔记首页
    public function index()
    {
        $blogList = Blog::orderby('created_at','desc')
        ->paginate(15);

        $data = ['bloglist'=>$blogList];
        return view('blog.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request, $id)
    {
        $data = Blog::where('shorturl', $id)->first();
        if(!$data){
            return abort(404);
        }
        return view('blog.blog',['data'=>$data]);
    }
 
    public function getBlogMd($id){
        echo (Blog::where('id',$id)->first(['markdown'])->markdown);
    }
}