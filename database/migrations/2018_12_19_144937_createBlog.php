<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('createblog', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('judul');
            $table->string('subjudul');
            $table->string('createby');
            $table->string('para1','1000');
            $table->string('para2','1000');
            $table->string('para3','1000');
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
        Schema::drop('createblog');
    }
}
