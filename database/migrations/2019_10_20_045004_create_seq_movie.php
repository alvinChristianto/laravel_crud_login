<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeqMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #schema drop tidak bekerja jadi ditaruh diatas
        Schema::connection('mysql2')->drop('tb_seq_id');
        #Schema::create('tb_seq_id', function (Blueprint  $table){
        Schema::connection('mysql2')->create('tb_seq_id', function($table){
            $table->unsignedInteger('idseq');
            $table->string('info');
                           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('tb_seq_id');
    }
}
