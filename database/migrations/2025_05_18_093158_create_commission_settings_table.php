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
    Schema::create('commission_settings', function (Blueprint $table) {
        $table->id();
        $table->unsignedTinyInteger('level'); // 1 to 10
        $table->decimal('percentage', 5, 2); // like 30.00 for 30%
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_settings');
    }
};
