<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCustomPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_pages', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
            $table->string('sort')->nullable();
        });
        Schema::table('custom_page_translations', function (Blueprint $table){
            $table->string('page_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_pages', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('sort');
        });
        Schema::table('custom_page_translations', function (Blueprint $table){
            $table->dropColumn('page_title');
        });
    }
}
