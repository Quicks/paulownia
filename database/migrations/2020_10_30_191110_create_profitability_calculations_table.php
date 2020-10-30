<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitabilityCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profitability_calculations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_id')->unsigned();
            $table->integer('p_type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('tree_amount')->default(1);
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
        Schema::dropIfExists('profitability_calculations');
    }
}
