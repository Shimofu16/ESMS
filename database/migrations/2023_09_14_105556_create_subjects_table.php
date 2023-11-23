<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('unit');
            $table->string('type'); // core, elective, specialization
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('grade_level_id');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('semester_id')->references('id')->on('sems');
            $table->foreign('grade_level_id')->references('id')->on('grade_levels');
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
        Schema::dropIfExists('subjects');
    }
}
