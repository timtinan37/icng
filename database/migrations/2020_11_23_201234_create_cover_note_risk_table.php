<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverNoteRiskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_note_risk', function (Blueprint $table) {
            $table->uuid('cover_note_id');
            $table->foreign('cover_note_id')->references('id')->on('cover_notes')->onDelete('cascade');
            $table->uuid('risk_id');
            $table->foreign('risk_id')->references('id')->on('risks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cover_note_risk');
    }
}
