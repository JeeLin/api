<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
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
