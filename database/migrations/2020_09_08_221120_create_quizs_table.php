<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizs', function (Blueprint $table) {
            $table->bigIncrements('quiz_id');
            $table->string('titre');
            $table->integer('class_id');
            $table->integer('duree'); //en minutes
            $table->string('categorie');//kestion yo gen categorie tou. donc nou ka creer des groupes de questions.
            $table->integer('nombre_questions'); 
            $table->softDeletes();
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
        Schema::dropIfExists('quizs');
    }
}
