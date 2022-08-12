<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->unsignedBigInteger('hasil_survey_id');
            $table->boolean('depan')->default(false);
            $table->boolean('belakang')->default(false);
            $table->boolean('kanan')->default(false);
            $table->boolean('kiri')->default(false);
            $table->boolean('ruang_tamu')->default(false);
            $table->boolean('ruang_tidur')->default(false);
            $table->boolean('kamar_mandi')->default(false);
            $table->boolean('dapur')->default(false);
            $table->boolean('kks')->default(false);
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
        Schema::dropIfExists('images');
    }
}
