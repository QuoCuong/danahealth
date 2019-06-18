<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->timestamp('date')->useCurrent();
            $table->decimal('total', 8, 0)->default(0);
            $table->enum('status', ['pending', 'approved', 'shipping', 'shipped', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('prescription_id');
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
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
        Schema::dropIfExists('orders');
    }
}
