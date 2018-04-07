<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('peneliti_id');
            $table->string('judul');
            $table->integer('volume')->unsigned();
            $table->integer('nomor')->unsigned();
            $table->integer('tahun')->unsigned();
            $table->timestamps();

            $table->foreign('peneliti_id')->references('id')->on('peneliti')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
}
