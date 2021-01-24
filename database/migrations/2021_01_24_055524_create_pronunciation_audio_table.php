<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronunciationAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronunciation_audio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pronunciation_id');
            $table->string('action_audio', 5);
            $table->string('type_audio', 10);
            $table->string('url', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronciation_audio');
    }
}
