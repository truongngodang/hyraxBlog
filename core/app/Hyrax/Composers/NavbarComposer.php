<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 28/06/2016
 * Time: 1:46 CH
 */

namespace App\Hyrax\Composers;
use Auth;
class NavbarComposer
{
    public function compose($view)
    {
        $user = Auth::user();

        $view->with(['user' => $user]);
    }
}