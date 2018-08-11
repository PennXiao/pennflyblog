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
     * Show the form for creating a new resource.
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
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
