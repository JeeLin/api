<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->uniqe();
            $table->string('nickname')->comment('用户名');
            $table->string('avatar_url')->comment('头像地址');
            $table->tinyInteger('status')->default('1')->comment('用户认证状态');
            $table->string('phone')->uniqe()->nullable();
            // $table->string('code',8)->default(88888888)->comment('验证码');
            $table->string('email')->uniqe()->nullable();
            $table->string('image_url')->uniqe()->nullable()->comment('执照图片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
