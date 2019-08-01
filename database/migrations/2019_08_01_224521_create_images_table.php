<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('image');
            });

        Schema::create('images_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('images_id')->unsigned();
            $table->string('title');
            $table->text('desc');
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['images_id','locale']);
            $table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images_translations');
        Schema::drop('images');
    }
}
