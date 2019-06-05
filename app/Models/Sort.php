<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    //隐藏部分
    protected $hidden = [
        'deleted_at','created_at', 'updated_at',
    ];

    //收藏所属用户
    public function type()
    {
        return $this->belongsTo(type::class, 'type_id');
    }

    //收藏所属图书
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
