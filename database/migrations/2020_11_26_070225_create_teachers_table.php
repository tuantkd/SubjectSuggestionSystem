<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('part_subject_id')->nullable();
            $table->foreign('part_subject_id')->references('id')
                ->on('part_subjects')->onDelete('cascade');

            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id')->references('id')
                ->on('titles')->onDelete('cascade');

            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('degree_id')->references('id')
                ->on('degrees')->onDelete('cascade');

            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')
                ->on('positions')->onDelete('cascade');

            $table->string('fullname')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();

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
        Schema::dropIfExists('teachers');
    }
}
