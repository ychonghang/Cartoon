<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('name',32)->unique()->comment('作品名');
            $table->string('desc',200)->nullable()->comment('作品简介');
            $table->string('authornotice',200)->nullable()->comment('作者公告');
            $table->string('theme_ids')->comment('存放作品题材id，就是分类里的一个id=2,以,id,id,id,存放');
            $table->integer('cartoon_type_id')->comment('存放作品类型id，就是分类里的一个id=0');
            $table->integer('user_group_id')->comment('用户群id，就是分类里的一个id=1');
            $table->tinyInteger('create_schedule')->default(0)->comment('创作进度，默认0，0连载中、1已完结');
            $table->string('imagepath')->comment('图片封面地址');   //  图片封面地址
            $table->tinyInteger('display')->default(0)->comment('是否上架,默认0,0:上架、1:下架');
            $table->tinyInteger('updtype')->default(0)->comment('更新类型，默认0，0:不定期,1:日更,2:周更');
            $table->tinyInteger('adopt')->default(0)->comment('审核,默认0，0:待审核、1:通过、2:不通过');
            $table->tinyInteger('publish')->default(0)->comment('发表,默认0，0:未发表、1:发表');
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
        Schema::dropIfExists('opuses');
    }
}
