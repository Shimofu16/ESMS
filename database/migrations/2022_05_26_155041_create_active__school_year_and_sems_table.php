<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveSchoolYearAndSemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active__school_year_and_sems', function (Blueprint $table) {
            $table->id();

            //Active SchoolYear foreign key
            $table->unsignedBigInteger('active_SY_id');
            $table->foreign('active_SY_id')->references('id')->on('school_years');  

            //Active Sem foreign key
            $table->unsignedBigInteger('active_sem_id');
            $table->foreign('active_sem_id')->references('id')->on('sems');
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
        Schema::dropIfExists('active__school_year_and_sems');
    }
}
