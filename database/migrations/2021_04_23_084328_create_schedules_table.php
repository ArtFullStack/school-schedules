<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week_day_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('week_day_id')->references('id')->on('week_days');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
