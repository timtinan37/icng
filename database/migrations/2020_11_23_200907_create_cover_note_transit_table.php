<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverNoteTransitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_note_transit', function (Blueprint $table) {
            $table->uuid('cover_note_id');
            $table->foreign('cover_note_id')->references('id')->on('cover_notes')->onDelete('cascade');
            $table->uuid('transit_id');
            $table->foreign('transit_id')->references('id')->on('transits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cover_note_transit');
    }
}
