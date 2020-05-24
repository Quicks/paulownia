<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('active')->nullable();
        });
        Schema::create('our_service_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('our_service_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('keywords')->nullable();
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['our_service_id','locale']);
            $table->foreign('our_service_id')->references('id')->on('our_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('our_service_translations');
        Schema::drop('our_services');
    }
}
