<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('invoice')->unique();
            $table->integer('qty');
            $table->integer('harga')->nullable();
            $table->boolean('approved');
            $table->timestamp('last_used_at')->nullable();
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
        Schema::dropIfExists('sale_order');
    }
}
