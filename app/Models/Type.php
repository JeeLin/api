<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //隐藏部分
    protected $hidden = [
        'deleted_at','created_at', 'updated_at',
    ];

    public function sorts()
    {
        return $this->hasMany(Sort::class);
    }

    //书籍
    public function books()
    {
        return $this->hasMany(Book::class, 'type_id', 'id');
    }
}
