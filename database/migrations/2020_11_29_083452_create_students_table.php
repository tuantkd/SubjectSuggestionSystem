<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('class_major_id')->nullable();
            $table->foreign('class_major_id')->references('id')
                ->on('class_majors')->onDelete('cascade');

            $table->string('student_code')->unique()->nullable();
            $table->string('student_fullname')->nullable();
            $table->string('student_birthday')->nullable();
            $table->string('student_sex')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_address')->nullable();
            $table->string('student_avatar')->nullable();

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
        Schema::dropIfExists('students');
    }
}
