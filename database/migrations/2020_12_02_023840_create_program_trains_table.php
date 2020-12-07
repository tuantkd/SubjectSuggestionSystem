<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_trains', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id')->unique()->nullable();
            $table->foreign('course_id')->references('id')
                ->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')
                ->on('majors')->onDelete('cascade');

            $table->string('program_train_name')->nullable();
            $table->date('program_train_date_begin')->nullable();

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
        Schema::dropIfExists('program_trains');
    }
}
