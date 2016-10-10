<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 28/06/2016
 * Time: 1:46 CH
 */

namespace App\Hyrax\Composers;
use App\Models\Post;
use App\Models\User;
use App\Models\Cate;
use Auth;
class SidebarAdminComposer
{
    public function compose($view)
    {
        $posts = Post::all();
        $users = User::all();
        $cates = Cate::all();
        $user = Auth::user();
        $view->with(['posts' => $posts, 'user' => $user, 'users' => $users, 'cates' => $cates]);
    }
}