<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cate;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use File;

class PostController extends Controller
{
    protected function saveImg($request, $post) {
        if ($request->hasFile('img')) {
            File::delete("uploads/post-images/$post->img");
            $img = $request->file('img');
            $img_name = time() . '_HyraxBlog_' . $img->getClientOriginalName();
            Image::make($img)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/post-images/' . $img_name));
            $post->img = $img_name;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::all();
        return view('admin.pages.posts.create')->withCates($cates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'title' => 'required|max:255',
            'desc' => 'required',
            'img' => 'required',
            'body' => 'required',
            'cate' => 'required'
        ));

        $post = new Post;
        $user = $request->user();

        $post->user_id = $user->id;

        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->body = $request->body;

        $cate = Cate::where('name', '=', $request->cate)->first();
        $post->cate_id = $cate->id;

        $slug = str_slug($request->title, '-');
        $post->slug = $slug;

        $this->saveImg($request, $post);
        $post->save();
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.pages.posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // tìm trong data base
        $post = Post::find($id);
        $cates = Cate::all();
        // return view and pass
        return view('admin.pages.posts.edit',['post'=>$post, 'cates'=>$cates]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu
        $this->validate($request, array(
            'title' => 'required|max:255',
            'desc' => 'required',
            'body' => 'required',
            'cate' => 'required'
        ));
        // lưu trữ trong database
        $post = Post::find($id);
        $user = $request->user();

        $post->user_id = $user->id;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->desc = $request->input('desc');
        $slug = str_slug($request->input('title'), '-');
        $post->slug = $slug;

        $this->saveImg($request,$post);

        $cate = Cate::where('name', '=', $request->input('cate'))->first();
        $post->cate_id = $cate->id;

        $post->save();

        // Chuyển hướng page khác
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete("uploads/post-images/$post->img");
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
