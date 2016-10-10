<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Cate extends Model
{
    public function post() {
        return $this->hasMany('App\Models\Post', 'cate_id', 'id');
    }
    
    public function countPost() {
        $posts = Post::all();
        $s = 0;
        foreach ($posts as $post){
            if ($post->cate_id == $this->id) {
                $s++;
            }
        }
        return $s;
    }
}
