<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('ingredients');
            $table->text('objects_used');
            $table->text('dosage_and_usage');
            $table->text('preservation');
            $table->text('careful');
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicines');
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
        Schema::dropIfExists('medicine_details');
    }
}
