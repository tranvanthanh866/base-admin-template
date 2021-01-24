<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronunciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronunciations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('describe_id')->unsigned();
            $table->string('uk_ipa', 191)->nullable();
            $table->string('us_ipa', 191)->nullable();
            $table->timestamps();

            $table->foreign('describe_id')->references('id')->on('describes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronunciations');
    }
}
