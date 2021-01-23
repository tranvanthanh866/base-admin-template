<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentenceExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentence_examples', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('describe_id')->unsigned();
            $table->string('content', 191);
            $table->timestamps();

            $table->foreign('describe_id')->references('id')->on('describes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentence_examples');
    }
}
