<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentarniFilmoviSviPodacisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentarni_filmovi_svi_podacis', function (Blueprint $table) {
            $table->id();
            $table->string('ime_filma', 50);
            $table->unsignedBigInteger('kategorija_id');
            $table->foreign('kategorija_id')->references('id')->on('dokumentarni_kategotijas');
            $table->string('opis_filma', 200);
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('dokumentarni_autoris');
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
        Schema::dropIfExists('dokumentarni_filmovi_svi_podacis');
    }
}