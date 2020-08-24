<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('search');
            $table->unsignedBigInteger('count')->default(1);
            $table->enum('type', ['product']);
            $table->unsignedBigInteger('results');
            $table->string('result_ids')->nullable();
            $table->timestamps();

            $table->unique(['search', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_searches');
    }
}
