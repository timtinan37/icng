<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_notes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('issuing_office_id');
            $table->foreign('issuing_office_id')->references('id')->on('branches');
            $table->text('insured_bank_address');
            $table->string('insured_bank_account_name');
            $table->text('insured_address');
            $table->text('interest_covered');
            $table->string('voyage_from');
            $table->string('voyage_to');
            $table->string('voyage_via');
            $table->uuid('carriage_id');
            $table->foreign('carriage_id')->references('id')->on('carriages');
            $table->string('amount_insured_usd');
            $table->string('amount_insured_tolerance');
            $table->string('usd_to_bdt_rate');
            $table->string('amount_insured_bdt');
            $table->date('period_starts');
            $table->date('period_ends');
            $table->unsignedBigInteger('mr_no');
            $table->string('tariff');
            $table->string('net_premium_bdt');
            $table->string('vat_rate');
            $table->string('vat_amount_bdt');
            $table->string('stamp_duty_bdt');
            $table->string('total_premium_bdt');
            $table->uuid('issued_by');
            $table->foreign('issued_by')->references('id')->on('users');
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
        Schema::dropIfExists('cover_notes');
    }
}
