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
        Schema::create('voucher_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('method'); // নগদ, বিকাশ, রকেট
            $table->string('number');
            $table->decimal('amount', 10, 2);
            $table->decimal('charge', 10, 2);
            $table->decimal('received', 10, 2);
            $table->string('status')->default('pending'); // pending, successful, failed
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_transfers');
    }
};
