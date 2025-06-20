<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_fixed_commission_settings_table.php
public function up()
{
    Schema::create('fixed_commission_settings', function (Blueprint $table) {
        $table->id();
        $table->integer('generation'); // 1 to 10
        $table->decimal('amount', 10, 2); // fixed amount for that generation
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_commission_settings');
    }
};
