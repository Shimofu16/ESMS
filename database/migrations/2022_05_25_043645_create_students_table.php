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
            $table->string('image')->nullable();
            $table->string('lrn')->nullable();
            $table->string('std_num')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('nationality')->nullable();
            $table->string('b_date')->nullable();
            $table->string('contact_num')->nullable();
            $table->string('house_num')->nullable();
            $table->string('purok')->nullable();
            $table->string('brgy')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('f_name')->nullable();
            $table->string('f_occu')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_occu')->nullable();
            $table->string('g_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('g_contact_num')->nullable();
            $table->string('g_add')->nullable();
            $table->string('prev_school')->nullable();
            $table->string('prev_school_type')->nullable();
            $table->string('jhs_yrs')->nullable();
            $table->string('year_grad')->nullable();
            $table->string('gen_ave')->nullable();
            $table->string('prim_grade')->nullable();
            $table->string('prim_grade_yr')->nullable();
            $table->string('intermediate')->nullable();
            $table->string('intermediate_yr')->nullable();
            $table->string('junior_hs')->nullable();
            $table->string('junior_hs_yr')->nullable();
            $table->string('type');
            // $table->string('sr_hs');
            // $table->string('sr_hs_yr');
            // $table->string('college');
            // $table->string('college_yr');
            $table->integer('status');
            $table->timestamps();
            $table->integer('enrollment_id');
            $table->string('shs_yr_graduated')->nullable();
            $table->string('reason_for_dropout')->nullable();
            $table->string('dropout_date')->nullable();

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
