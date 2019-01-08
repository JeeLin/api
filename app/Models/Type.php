<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //书籍
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
