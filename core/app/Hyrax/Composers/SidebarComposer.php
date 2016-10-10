<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 28/06/2016
 * Time: 1:46 CH
 */

namespace App\Hyrax\Composers;

use App\Hyrax\Repositories\PostPopularsRepository;
use App\Hyrax\Repositories\PostHeadRepository;

class SidebarComposer
{
    protected $postPopulars;
    protected $postHead;

    public function __construct()
    {   $postPopulars = new PostPopularsRepository();
        $postHead = new PostHeadRepository();
        $this->postPopulars = $postPopulars;
        $this->postHead = $postHead;
    }

    public function compose($view) 
    {
        if (count($this->postPopulars->get()) > 0 && count($this->postHead->get()) > 0)
            $view->with(['postPopulars' => $this->postPopulars->get(), 'postHead' => $this->postHead->get()]);
    }
}