<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            $table->string('Form137', 32)->nullable();
            $table->string('Form137_Path')->nullable();
            $table->string('Form137_Document', 128)->nullable();
            
            $table->string('PSA', 32)->nullable();
            $table->string('PSA_Path')->nullable();
            $table->string('PSA_Document', 128)->nullable();

            $table->string('JHS_cert', 32)->nullable();
            $table->string('JHS_cert_Path')->nullable();
            $table->string('JHS_cert_Document', 128)->nullable();


            $table->string('GoodMoral', 32)->nullable();
            $table->string('GoodMoral_Path')->nullable();
            $table->string('GoodMoral_Document', 128)->nullable();

            $table->string('Card', 32)->nullable();
            $table->string('Card_Path')->nullable();
            $table->string('Card_Document', 128)->nullable();

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
        Schema::dropIfExists('documents');
    }
}
