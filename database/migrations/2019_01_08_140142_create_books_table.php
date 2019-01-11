<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover_url')->comment('封面图片');
            $table->string('title')->comment('书名');
            $table->string('author')->comment('作者');
            $table->decimal('price',10,2)->comment('价格');
            $table->string('press')->comment('出版社');
            $table->date('published_date')->comment('出版时间');
            $table->string('ISBN')->uniqe();
            $table->longtext('introduction')->comment('内容简介');
            $table->unsignedInteger('type_id')->comment('书籍分类编号');
            $table->unsignedInteger('book_code')->uniqe()->comment('一书一码');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
