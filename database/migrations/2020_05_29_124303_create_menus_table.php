<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('position');
            $table->integer('parent_id')->nullable();
            $table->string('link');

            
        });
        Schema::create('menu_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['menu_id','locale']);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_translations');
        Schema::dropIfExists('menus');
    }
}
