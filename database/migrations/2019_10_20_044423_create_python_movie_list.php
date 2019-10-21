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
            $table->unsignedInteger('movie_id')->unique();
            $table->string('title','100');
            $table->string('rating','20')->nullable();
            $table->string('movie_link','200')->nullable();
            $table->string('genre','30')->nullable();
            $table->string('produser','200')->nullable();
            $table->string('sutradara','200')->nullable();
            $table->string('writer','200')->nullable();
            $table->string('cast','200')->nullable();
            $table->string('sinopsis', '2000')->nullable();
            $table->string('rumah_produksi','100')->nullable();
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
