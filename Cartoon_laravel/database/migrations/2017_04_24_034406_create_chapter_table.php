<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chapternum')->comment('章节名称');
            $table->integer('opus_id')->comment('作品id');
            $table->tinyInteger('adopt')->default(0)->comment('待审核0，1通过，2不通过');
            $table->integer('tochapter')->comment('第几章节');
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
        Schema::dropIfExists('chapterss');
    }
}
