<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *  
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');  
            $table->string('age');	
            $table->string('email');   
            $table->string('mobile');
            $table->string('region')->nullable($value = false);	
            $table->string('ville');
            $table->string('deniere_diplome');
            $table->string('année_exper');
            $table->string('experience');
            $table->string('num_cni');
            $table->string('cv_file');
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
        Schema::dropIfExists('enseignants');
    }
}
