<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcommerceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerces', function (Blueprint $table) {
            $table->id();
            $table->integer('clients_id');
            $table->datetime('data_at');
            $table->float('total_sells');
            $table->float('pm');
            $table->float('conversions_rates');
            $table->float('cart_abandonment_rates');
            $table->float('customer_return_rates');
            $table->float('total_orders');
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
        Schema::dropIfExists('ecommerces');
    }
}
