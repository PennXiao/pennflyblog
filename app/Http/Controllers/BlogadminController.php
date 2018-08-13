<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;

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
        $navigation = \App\Navigation::get();
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
            $navigation = \App\Navigation::find($request->input('id'));
        }else{
            $navigation = new \App\Navigation();
        }
        $navigation->name = $request->input('name','未知列');
        $navigation->url = $request->input('url','blog');
        $navigation->sequence = $request->input('sequence',99);
        $navigation->save();
        return back()->withInput();
    }

    /**
     * 网站导航栏Nav.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        die('我需要分页');
        $navigation = \App\Blog::get();
        return view('admin.navList',['navList'=>$navigation]);
    }


    /**
     * 新增编辑网站nav导航
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogPost(Request $request)
    {
        die('我需要对数据');
        if ($request->input('id',false)) {
            $navigation = \App\Navigation::find($request->input('id'));
        }else{
            $navigation = new \App\Navigation();
        }
        $navigation->name = $request->input('name','未知列');
        $navigation->url = $request->input('url','blog');
        $navigation->sequence = $request->input('sequence',99);
        $navigation->save();
        return back()->withInput();
    }


}
