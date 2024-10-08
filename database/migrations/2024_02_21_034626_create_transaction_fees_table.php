<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('payment_transactions', 'id')->onDelete('cascade');
            $table->foreignId('fee_id')->constrained('fees', 'id')->onDelete('cascade');
            $table->double('fee_amount');
            $table->double('amount');
            $table->enum('type', ['tuition', 'registration', 'miscellaneous', 'activity', 'other']);
            $table->timestamps();
        });
    }

    /**+
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_fees');
    }
}
