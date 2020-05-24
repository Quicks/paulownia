<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransableToSlider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('keywords')->nullable();
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['slider_id','locale']);
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_translations');
    }
}
