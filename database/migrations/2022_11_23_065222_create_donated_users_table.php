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
        Schema::create('donated_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_stock_id')->references('id')->on('blood_stocks')->onDelete('cascade');
            $table->foreignId('donar_id')->references('id')->on('donars')->onDelete('cascade');
            $table->string('last_donation_date');
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
        Schema::dropIfExists('donated_users');
    }
};
