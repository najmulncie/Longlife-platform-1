<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_activation_requests_table.php
public function up()
{
    Schema::create('activation_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('method'); // bkash, nagad, etc
        $table->string('user_number');
        $table->string('transaction_id');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activation_requests');
    }
};
