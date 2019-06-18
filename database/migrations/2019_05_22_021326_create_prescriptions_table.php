<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date')->useCurrent();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('fullname');
            $table->string('address');
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('prescriptions');
    }
}
