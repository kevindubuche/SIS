<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->integer('student_id');
            $table->integer('fee_id');
            $table->integer('user_id');
            $table->integer('paid');
            $table->date('transaction_date');
            $table->string('remark');
            $table->longText('time_id');
            $table->longText('description');
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
        Schema::dropIfExists('class_transactions');
    }
}
