<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_majors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')
                ->on('majors')->onDelete('cascade');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')
                ->on('courses')->onDelete('cascade');

            $table->string('class_major_code')->unique()->nullable();
            $table->string('class_major_name')->nullable();
            $table->integer('class_major_total_number')->nullable();

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
        Schema::dropIfExists('class_majors');
    }
}
