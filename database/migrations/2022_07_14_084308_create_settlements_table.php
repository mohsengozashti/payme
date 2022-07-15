<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('transaction_id');
            $table->string('settlement_id');
            $table->string('customer_bank_name');
            $table->string('customer_bank_code');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('remark');
            $table->enum('status',[0,1,2])->comment('0 : reject , 1 : accept , 2 : pending ');
            $table->enum('update_by',['bot','1001']);
            $table->unsignedBigInteger('amount');;
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('settlements');
    }
}
