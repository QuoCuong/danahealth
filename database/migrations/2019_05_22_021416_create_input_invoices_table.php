<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date')->useCurrent();
            $table->decimal('total', 8, 0);
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('input_invoices');
    }
}
