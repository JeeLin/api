<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //隐藏部分
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //书籍所属类型
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    //收藏
    public function collection()
    {
        return $this->hasMany(Collection::class);
    }

    //视频
    public function video()
    {
        return $this->hasMany(Video::class);
    }
}
