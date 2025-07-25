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
    Schema::table('withdraws', function (Blueprint $table) {
        $table->decimal('charge', 10, 2)->after('amount')->default(0);
    });
}

public function down(): void
{
    Schema::table('withdraws', function (Blueprint $table) {
        $table->dropColumn('charge');
    });
}

};
