<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoumissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->bigIncrements('soumission_id');
            $table->integer('course_id');
            $table->integer('class_id');
            $table->text('description');
            $table->string('filename');
            $table->softDeletes();
            $table->integer('created_by');  
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
        Schema::dropIfExists('soumissions');
    }
}
