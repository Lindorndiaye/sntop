<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->integer('age');	
            $table->string('email');
            $table->string('specialite');
            $table->string('mobile');
            $table->string('region')->nullable($value = false);	
            $table->string('ville');
            $table->string('diplome');
            $table->string('diplomem');
            $table->string('nin');
            $table->string('nd');
            $table->string('adressed');
            $table->string('adressea');
            $table->string('nf');
            $table->string('em');
           
            
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
        Schema::dropIfExists('students');
    }
}