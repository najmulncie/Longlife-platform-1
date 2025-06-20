<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('password');

            // নিজস্ব ইউনিক রেফারেল কোড
            $table->string('referral_code')->unique();

            // যিনি রেফার করেছেন তার ID (nullable)
            $table->unsignedBigInteger('referred_by')->nullable();

            $table->rememberToken();
            $table->timestamps();

            // foreign key constraint
            $table->foreign('referred_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};