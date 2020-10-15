<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('custom_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('position');
            $table->integer('parent_id')->nullable();
            $table->string('link');
        });
        Schema::create('custom_page_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('custom_page_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['custom_page_id','locale']);
            $table->foreign('custom_page_id')->references('id')->on('custom_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_page_translations');

        Schema::dropIfExists('custom_pages');
    }
}
