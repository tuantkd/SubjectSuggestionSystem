<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('part_subject_id')->nullable();
            $table->foreign('part_subject_id')->references('id')
                ->on('part_subjects')->onDelete('cascade');

            $table->string('major_name')->unique()->nullable();
            $table->mediumText('major_note')->nullable();
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
        Schema::dropIfExists('majors');
    }
}
