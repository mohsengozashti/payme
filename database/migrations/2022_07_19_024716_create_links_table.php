<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('wallet_address')->nullable();
            $table->string('bank_name');
            $table->string('customer_name');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('expiration_duration')->comment('in minutes');
            $table->boolean('with_qr_code')->default(0);
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('links');
    }
}
