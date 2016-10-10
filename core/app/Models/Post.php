<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function User() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function cate() {
        return $this->belongsTo('App\Models\Cate', 'cate_id', 'id');
    }
}
