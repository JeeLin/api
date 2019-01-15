<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //隐藏部分
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //书籍
    public function books()
    {
        return $this->hasMany(Book::class, 'type_id', 'id');
    }
}
