<?php
    namespace App\Hyrax\Repositories;
    use App\Models\Post;
/**
 * Created by PhpStorm.
 * User: truon
 * Date: 16/06/2016
 * Time: 5:56 CH
 */
class PostPopularsRepository
{
    public function get() {
        $postPolulars = Post::orderBy('view_count', 'desc')->take(4)->get();
        return $postPolulars;
    }
}