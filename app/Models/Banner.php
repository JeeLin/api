<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //隐藏部分
    protected $hidden = [
        'deleted_at','created_at', 'updated_at',
    ];
}
