<?php

namespace App\Http\Controllers\Front;

use App\Models\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;

class PageController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        $postHead = Post::orderBy('view_count','desc')->first();
        if (count($posts) > 0) {
            return view('front.pages.index',['posts' => $posts, 'postHead' => $postHead]);
        } else {
            return view('front.pages.index');
        }
    }

    /**
     * @param $slug
     * @return mixed
     */

    public function getSingle($cate, $slug) {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $post->view_count += 1;
        $post->timestamps = false;
        $post->save();
        $post->timestamps = true;
        return view('front.pages.single')->withPost($post);
    }

    public function getCate($cateSlug) {
        $cates = Cate::all();
        foreach ($cates as $cate) {
            if ($cate->slug == $cateSlug) {
                $posts = Post::where('cate_id', '=', $cate->id)->orderBy('created_at','desc')->paginate(2);
                $postHead = Post::where('cate_id', '=', $cate->id)->orderBy('view_count','desc')->first();
                if (count($posts) > 0) {
                    return view('front.pages.index',['posts' => $posts, 'postHead' => $postHead]);
                } else {
                    return view('front.pages.index');
                }
            }
        }
    }
}
