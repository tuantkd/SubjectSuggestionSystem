<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subjects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')
                ->on('teachers')->onDelete('cascade');

            $table->unsignedBigInteger('semester_year_id')->nullable();
            $table->foreign('semester_year_id')->references('id')
                ->on('semester_years')->onDelete('cascade');

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')
                ->on('subjects')->onDelete('cascade');

            $table->string('class_subject_code')->unique()->nullable();
            $table->string('class_subject_name')->nullable();
            $table->text('class_subject_note')->nullable();

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
        Schema::dropIfExists('class_subjects');
    }
}
