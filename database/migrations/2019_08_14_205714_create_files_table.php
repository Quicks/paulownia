<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('file');
            $table->integer('fileable_id');
            $table->string('fileable_type');
        });

        Schema::create('files_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->string('title');
            $table->text('desc');
            $table->string('locale')->index();
            $table->timestamps();

            $table->unique(['file_id','locale']);
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files_translations');
        Schema::dropIfExists('files');
    }
}
