<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number');
            $table->string('invoice_id', '240');
            $table->string('trnxID', '240')->nullable();
            $table->Integer('price');
            $table->string('payerReference', '240')->nullable();
            $table->string('customerMsisdn', '240')->nullable();
            $table->string('payment_status')->default('due');
            $table->string('method', '240')->nullable();
            $table->string('statusCode', '240')->nullable();
            $table->string('statusMessage', '240')->nullable();
            $table->string('delivery_status')->default('processing');
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
        Schema::dropIfExists('orders');
    }
}
