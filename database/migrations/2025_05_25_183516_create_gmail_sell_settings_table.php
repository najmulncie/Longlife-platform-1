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
       Schema::create('gmail_sell_settings', function (Blueprint $table) {
    $table->id();
    $table->string('password')->nullable();
    $table->integer('limit')->default(0);
    $table->decimal('price', 8, 2)->default(0);
    $table->boolean('status')->default(0); // 1 = ON, 0 = OFF
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gmail_sell_settings');
    }
};
