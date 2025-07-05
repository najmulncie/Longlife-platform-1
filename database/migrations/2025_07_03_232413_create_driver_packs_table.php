<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver_packs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sim_operator_id')->constrained()->onDelete('cascade');
            $table->string('offer_title');
            $table->string('validity');
            $table->integer('price');
            $table->integer('cashback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_packs');
    }
};
