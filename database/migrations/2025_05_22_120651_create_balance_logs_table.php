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
       Schema::create('balance_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->decimal('amount', 12, 2); // যত টাকা যোগ হয়েছে
    $table->timestamps(); // created_at ব্যাবহার করব টাইম রেঞ্জ ফিল্টার করার জন্য
    $table->string('details')->nullable(); // বোনাস সোর্সের বিবরণ
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_logs');
    }
};

