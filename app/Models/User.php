<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'deleted_at','created_at', 'updated_at',
    ];

    public function collection()
    {
        return $this->hasMany(Collection::class, 'user_id');
    }

     //图书与用户多对多
     public function books()
     {
         return $this->belongsToMany(Book::class,'collections', 'user_id', 'book_id');
     }
}
