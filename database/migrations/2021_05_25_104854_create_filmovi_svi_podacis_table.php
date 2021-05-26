<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmoviSviPodacisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovi_svi_podacis', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_filma', 100);
            $table->unsignedBigInteger('kategorija_id');
            $table->foreign('kategorija_id')->references('id')->on('filmovi_kategorijas');
            $table->string('opis_filma', 200);
            $table->unsignedBigInteger('godina_izlaska_id');
            $table->foreign('godina_izlaska_id')->references('id')->on('filmovi_godina_izlaskas');
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
        Schema::dropIfExists('filmovi_svi_podacis');
    }
}
