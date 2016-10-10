<?php
/**
 * Created by PhpStorm.
 * User: truon
 * Date: 16/06/2016
 * Time: 6:02 CH
 */

namespace App\Hyrax\Repositories;
use App\Models\Post;

class PostHeadRepository
{
    public function get() {
        $postHead = Post::orderBy('view_count','desc')->first();
        return $postHead;
    }
}