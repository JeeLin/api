<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('book_id');
            $table->unsignedinteger('order')->comment('章节顺序');
            $table->string('catalog')->comment('章节内容');
            $table->string('video_url')->comment('视频地址');
            $table->unsignedinteger('video_code')->uniqe()->comment('一章一码');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
