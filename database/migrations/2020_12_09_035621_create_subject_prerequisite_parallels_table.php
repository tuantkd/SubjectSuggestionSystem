<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectPrerequisiteParallelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_prerequisite_parallels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')
                ->on('subjects')->onDelete('cascade');

            $table->unsignedBigInteger('prerequisite_parallel_id')->nullable();
            $table->foreign('prerequisite_parallel_id')->references('id')
                ->on('prerequisite_parallels')->onDelete('cascade');

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
        Schema::dropIfExists('subject_prerequisite_parallels');
    }
}
