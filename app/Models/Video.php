<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //隐藏部分
    protected $hidden = [
        'deleted_at','created_at', 'updated_at',
    ];

    //视频所属书籍
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
