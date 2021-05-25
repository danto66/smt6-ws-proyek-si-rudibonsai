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
            $table->integer('shipping_cost');
            $table->integer('product_total_amount');
            $table->integer('grand_total_amount');
            $table->integer('quantity_total');
            $table->string('payment_agent');
            $table->string('payment_type');
            $table->string('shipping_agent');
            $table->string('shipping_service');
            $table->enum('status', ['Tertunda', 'Diproses', 'Dikirim', 'Selesai', 'Batal']);
            $table->string('payment_proof')->default('empty');
            $table->timestamp('expired_at');
            $table->unsignedBigInteger('user_id');
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
