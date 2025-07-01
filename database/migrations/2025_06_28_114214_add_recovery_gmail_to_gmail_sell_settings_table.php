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
        Schema::table('gmail_sell_settings', function (Blueprint $table) {
             $table->string('recovery_gmail')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gmail_sell_settings', function (Blueprint $table) {
            $table->dropColumn('recovery_gmail');
        });
    }
};
