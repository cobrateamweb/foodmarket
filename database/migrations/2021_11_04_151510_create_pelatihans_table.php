<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->text('konten')->nullable();
            $table->text('hargaOnline')->nullable();
            $table->text('hargaOffline')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('jadwalTraining')->nullable();
            $table->string('running')->nullable();
            $table->string('types')->nullable();
            $table->text('picturePath')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('pelatihans');
    }
}
