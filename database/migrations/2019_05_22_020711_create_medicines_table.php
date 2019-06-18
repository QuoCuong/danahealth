<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('unit');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8, 0);
            $table->date('exp');
            $table->unsignedBigInteger('medicine_group_id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('medicine_group_id')->references('id')->on('medicine_groups');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('medicines');
    }
}
