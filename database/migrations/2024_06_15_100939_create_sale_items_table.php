<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id');
            $table->foreignId('sale_invoice_id');

            $table->double('quantity');
            $table->double('price');
            $table->double('total');

            $table->timestamps();

            #$table->foreign('product_id')->references('id')->on('products');
            #$table->foreign('sale_invoice_id')->references('id')->on('sale_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
}
