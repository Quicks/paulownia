<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            });

        Schema::create('partner_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['partner_id','locale']);
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_translations');
        Schema::drop('partners');
    }
}
