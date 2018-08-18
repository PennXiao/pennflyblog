<?php

namespace App\Http\Controllers\Blog;
use View;
use App\Blog\Navigation;
use App\Blog\Tagcloud; 
use App\Blog\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    
    function __construct(){
        // 这里取整个导航栏的数据 
        View::share('navigation', Navigation::get());
        View::share('tagcloud', Tagcloud::get());
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogList = Blog::orderby('created_at','desc')->paginate(15);
        return view('blog.index',['bloglist'=>$blogList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request, $id)
    {
        return view('blog.blog',['data'=>Blog::find( $id)]);
    }
 
    public function getBlogMd($id){
        echo (Blog::where('id',$id)->first(['markdown'])->markdown);
    }
}
