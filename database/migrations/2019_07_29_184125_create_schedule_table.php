<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_model_id')->nullable();
            $table->integer('subject_number');
            $table->integer('day');
            $table->unsignedInteger('teacher_id')->nullable();
            $table->string('subject')->nullable();

            $table->unique(['class_model_id', 'day', 'subject_number']);
            $table->timestamps();

            $table->foreign('class_model_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
