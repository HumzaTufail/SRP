<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterFreezesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_freezes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reason');
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
        Schema::dropIfExists('semester_freezes');
    }
}
