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
        Schema::create('withdraws', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('method_id')->nullable()->constrained('withdraw_methods')->onDelete('set null');
    $table->foreignId('type_id')->nullable()->constrained('withdraw_types')->onDelete('set null');
    $table->decimal('amount', 10, 2);
    $table->string('number')->nullable(); // প্রাপক নাম্বার
    $table->string('status')->default('pending');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
