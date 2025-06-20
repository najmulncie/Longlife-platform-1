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
    Schema::create('user_leaderships', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('leadership_level_id')->constrained()->onDelete('cascade');
        $table->boolean('is_claimed')->default(false); // ক্লেইম করা হয়েছে কিনা
        $table->timestamp('claimed_at')->nullable(); // কখন ক্লেইম করা হয়েছে
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_leaderships');
    }
};
