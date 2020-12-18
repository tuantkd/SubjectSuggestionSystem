<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_scores', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('class_subject_id')->nullable();
            $table->foreign('class_subject_id')->references('id')
                ->on('class_subjects')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')
                ->on('students')->onDelete('cascade');

            $table->string('score_char')->nullable();
            $table->double('score_number')->nullable();
            $table->double('score_ladder_four')->nullable();

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
        Schema::dropIfExists('detail_scores');
    }
}
