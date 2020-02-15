<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFAQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a_qs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')->unsigned();
            $table->timestamps();

            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            });

        Schema::create('f_a_q_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('f_a_q_id')->unsigned();
            $table->string('question')->nullable();
            $table->text('answer')->nullable();
            $table->string('locale')->index();

            $table->unique(['f_a_q_id','locale']);
            $table->foreign('f_a_q_id')->references('id')->on('f_a_qs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('f_a_qs', function (Blueprint $table) {
            $table->dropForeign('content_id');
        });
        Schema::drop('f_a_q_translations');
        Schema::drop('f_a_qs');
    }
}
