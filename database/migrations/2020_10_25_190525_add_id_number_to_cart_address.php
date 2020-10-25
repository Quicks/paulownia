<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdNumberToCartAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_address', function (Blueprint $table) {
            $table->string('id_number');
        });
        Schema::table('order_address', function (Blueprint $table) {
            $table->string('id_number');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_address', function (Blueprint $table) {
            $table->dropColumn('id_number');
        });
        Schema::table('cart_address', function (Blueprint $table) {
            $table->dropColumn('id_number');
        });
        
    }
}
