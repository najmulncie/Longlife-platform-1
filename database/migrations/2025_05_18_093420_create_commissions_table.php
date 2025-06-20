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
    Schema::create('commissions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('from_user_id'); // যেই ইউজারের কারণে কমিশন
        $table->unsignedBigInteger('to_user_id');   // যিনি কমিশন পাচ্ছেন
        $table->unsignedTinyInteger('level');
        $table->decimal('amount', 10, 2);
        $table->timestamps();

        $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
