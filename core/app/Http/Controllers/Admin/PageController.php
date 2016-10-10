<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getIndex() {
        $user = Auth::user();
        return view('admin.pages.index')->withUser($user);
    }
}
