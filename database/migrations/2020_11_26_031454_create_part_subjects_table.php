<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_subjects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')
                ->on('departments')->onDelete('cascade');

            $table->string('part_subject_name')->unique()->nullable();
            $table->mediumText('part_subject_description')->nullable();

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
        Schema::dropIfExists('part_subjects');
    }
}
