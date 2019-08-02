<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTreatisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatises', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->boolean('active')->nullable();
            $table->date('publish_date')->nullable();
            });

        Schema::create('treatise_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('treatise_id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('locale')->index();

            $table->unique(['treatise_id','locale']);
            $table->foreign('treatise_id')->references('id')->on('treatises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('treatise_translations');
        Schema::drop('treatises');
    }
}
