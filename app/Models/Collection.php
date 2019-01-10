<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //隐藏部分
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //收藏所属用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //收藏所属图书
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
