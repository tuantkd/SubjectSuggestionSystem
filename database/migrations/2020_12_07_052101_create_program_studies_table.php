<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_studies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_subject_id')->nullable();
            $table->foreign('category_subject_id')->references('id')
                ->on('category_subjects')->onDelete('cascade');

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')
                ->on('subjects')->onDelete('cascade');

            $table->unsignedBigInteger('program_train_id')->nullable();
            $table->foreign('program_train_id')->references('id')
                ->on('program_trains')->onDelete('cascade');

            $table->text('program_studie_note')->nullable();

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
        Schema::dropIfExists('program_studies');
    }
}
