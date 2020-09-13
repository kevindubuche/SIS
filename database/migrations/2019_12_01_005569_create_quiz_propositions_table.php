<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizPropositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_propositions', function (Blueprint $table) {
            $table->bigIncrements('id_proposition');
            $table->bigInteger('id_question');
            $table->foreign('id_question')->references('id_question')->on('quiz_questions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('content_prop');
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
        Schema::dropIfExists('quiz_propositions');
    }
}
