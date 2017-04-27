<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterimgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapterimgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id')->comment('章节id');;
            $table->integer('order')->comment('图片顺序');
            $table->string('imgname')->comment('图片名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapterimgs');
    }
}
