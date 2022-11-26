<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_bank_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->foreignId('user_id')->default(1);
            $table->longText('message');
            $table->string('required_date');
            
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
        Schema::dropIfExists('blood_bank_requests');
    }
};
