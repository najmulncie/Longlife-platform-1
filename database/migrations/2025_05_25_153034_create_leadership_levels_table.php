<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('leadership_levels', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Leadership নাম
        $table->integer('target_count'); // টার্গেট সংখ্যা
        $table->decimal('reward_amount', 10, 2); // পুরস্কার এমাউন্ট
        $table->tinyInteger('level_number'); // লেভেল নম্বর (১ম, ২য়...)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadership_levels');
    }
};
