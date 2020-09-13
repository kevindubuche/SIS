<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_reponses', function (Blueprint $table) {
            $table->bigIncrements('id_reponse');
            $table->bigInteger('id_question');
            $table->foreign('id_question')->references('id_question')->on('quiz_questions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('explication');
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
        Schema::dropIfExists('quiz_reponses');
    }
}
