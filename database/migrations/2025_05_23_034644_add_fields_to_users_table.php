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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable();
            }

            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(1);
            }

            if (!Schema::hasColumn('users', 'is_banned')) {
                $table->boolean('is_banned')->default(false);
            }

            if (!Schema::hasColumn('users', 'admin_message')) {
                $table->text('admin_message')->nullable();
            }

            // ⚠️ balance কলাম যদি আগে থেকেই থাকে, নিচের লাইনটি Comment করে রাখুন
            // if (!Schema::hasColumn('users', 'balance')) {
            //     $table->decimal('balance', 10, 2)->default(0);
            // }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }

            if (Schema::hasColumn('users', 'is_active')) {
                $table->dropColumn('is_active');
            }

            if (Schema::hasColumn('users', 'is_banned')) {
                $table->dropColumn('is_banned');
            }

            if (Schema::hasColumn('users', 'admin_message')) {
                $table->dropColumn('admin_message');
            }

            // ⚠️ balance কলাম drop করার দরকার নেই যদি আগে থেকেই থাকে
            // if (Schema::hasColumn('users', 'balance')) {
            //     $table->dropColumn('balance');
            // }
        });
    }
};
