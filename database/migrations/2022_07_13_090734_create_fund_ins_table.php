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
            $table->string('order_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('customer_bank_name')->nullable();
            $table->string('customer_bank_code')->nullable();
            $table->string('product')->nullable();
            $table->enum('status',[0,1,2])->comment('0 : reject , 1 : accept , 2 : pending ');
            $table->enum('update_by',['auto','manual']);
            $table->unsignedDouble('requested_amount');
            $table->unsignedBigInteger('fund_in_commission')->nullable();
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
