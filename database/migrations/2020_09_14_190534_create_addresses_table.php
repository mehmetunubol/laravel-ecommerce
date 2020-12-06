<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('address_name');
            $table->string('firm_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address',255);
            $table->string('district');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('tax_administration');
            $table->string('tax_no');
            $table->boolean('is_default')->default('0');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
