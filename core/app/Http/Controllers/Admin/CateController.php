<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Post;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Cate::all();
        return view('admin.pages.cates.index')->withCates($cates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.cates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Cate();
        $cate->name = $request['name'];
        $cate->slug = str_slug($request['name']);
        $cate->save();
        return redirect()->route('admin.cates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Cate::find($id);
        return view('admin.pages.cates.edit')->withCate($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cate = Cate::find($id);
        $cateName = $request['name'];
        $cate->name = $cateName;
        $cate->slug = str_slug($cateName);
        $cate->save();

        return redirect()->route('admin.cates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::where('cate_id','=',$id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        $cate = Cate::find($id);
        $cate->delete();

        return redirect()->route('admin.cates.index');
    }
}
