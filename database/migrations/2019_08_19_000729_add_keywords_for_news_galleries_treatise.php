<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeywordsForNewsGalleriesTreatise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_translations', function (Blueprint $table) {
            $table->string('keywords')->nullable();
        });
        Schema::table('galleries_translations', function (Blueprint $table) {
            $table->string('keywords')->nullable();
        });
        Schema::table('treatise_translations', function (Blueprint $table) {
            $table->string('keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_translations', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });
        Schema::table('galleries_translations', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });
        Schema::table('treatise_translations', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });
    }
}
