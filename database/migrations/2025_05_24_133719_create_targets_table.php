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
       Schema::create('targets', function (Blueprint $table) {
    $table->id();
    $table->enum('type', ['daily', 'weekly', 'monthly', 'lifetime']);
    $table->integer('required_active_refs');
    $table->decimal('reward_amount', 10, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
