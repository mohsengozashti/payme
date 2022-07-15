<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_ins', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('transaction_id');
            $table->string('customer_bank_name');
            $table->string('customer_bank_code');
            $table->string('product')->nullable();
            $table->enum('status',[0,1,2])->comment('0 : reject , 1 : accept , 2 : pending ');
            $table->enum('update_by',['auto','manual']);
            $table->unsignedBigInteger('requested_amount');
            $table->unsignedBigInteger('fund_in_commission');
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
        Schema::dropIfExists('fund_ins');
    }
}
