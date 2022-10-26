<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This will setup each fields within the join table orderline, according to each of their data types.
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
     * @return void
     */
    public function up()
    {
        Schema::create('orderline', function (Blueprint $table) {
            $table->id('orderline_ref_no');
            $table->foreignId('order_ref_no');
            $table->foreignId('product_id');
            $table->dateTime('order_date');
            $table->integer('quantity', 100);
            $table->float('price');
            $table->float('total_product_price');
            $table->boolean('is_in_basket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderline');
    }
};
