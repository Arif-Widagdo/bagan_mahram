<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('persons', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('tempatLahir');
            $table->timestamp('tanggalLahir');
            $table->string('jenisKelamin');
            $table->integer('persons_id');
            $table->timestamps();
        });
    }

    public function down(){
        //
    }
};
