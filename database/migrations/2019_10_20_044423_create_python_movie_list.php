<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePythonMovieList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #schema drop tidak bekerja jadi ditaruh diatas
        Schema::connection('mysql2')->drop('tb_movie_list');
        #Schema::create('tb_movie_list', function (Blueprint  $table){
        Schema::connection('mysql2')->create('tb_movie_list', function($table){
            $table->unsignedInteger('movie_id');
            $table->string('title');
            $table->string('rating');
            $table->string('movie_link');
            $table->string('genre');
            $table->string('produser');
            $table->string('sutradara');
            $table->string('writer');
            $table->string('cast');
            $table->string('sinopsis');
            $table->string('rumah_produksi');
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
        Schema::connection('mysql2')->drop('tb_movie_list');
    }
}
