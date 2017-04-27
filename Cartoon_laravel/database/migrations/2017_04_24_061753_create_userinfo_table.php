<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('userinfo', function (Blueprint $table)
      {
          $table->increments('id');
          $table->integer('uid');
          $table->string('tel');
          $table->integer('sex')->defaulet(0);
          $table->date('birthday');
          $table->string('address');
          $table->string('citylocation');
          $table->string('realname');
          $table->integer('infostatus')->defaulet(0);
          $table->integer('vip')->defaulet(0);
          $table->integer('type')->defaulet(0);
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
        Schema::dropIfExists('userinfo');
    }
}
