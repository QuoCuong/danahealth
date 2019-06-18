<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_invoice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->default(10);
            $table->integer('lot');
            $table->decimal('subtotal', 8, 0)->default(0);
            $table->date('exp');
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('input_invoice_id');
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->foreign('input_invoice_id')->references('id')->on('input_invoices');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_invoice_details');
    }
}
