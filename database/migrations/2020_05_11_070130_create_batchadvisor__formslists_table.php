<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchadvisorFormslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batchadvisor__formslists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_username');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_batch');
            $table->integer('student_id');
            $table->integer('batchadvisor_id');

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
        Schema::dropIfExists('batchadvisor__formslists');
    }
}
