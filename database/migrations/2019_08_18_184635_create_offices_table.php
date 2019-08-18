<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            });

        Schema::create('office_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('office_id')->unsigned();
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['office_id','locale']);
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('office_translations');
        Schema::drop('offices');
    }
}
