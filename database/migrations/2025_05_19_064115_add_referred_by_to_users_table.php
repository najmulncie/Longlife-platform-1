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
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('referred_by')->nullable()->after('id');

        // যদি আপনি চাচ্ছেন রেফার করা ইউজার ডিলিট হলে এই ইউজারের রেফার নাল হয়ে যাক
        $table->foreign('referred_by')->references('id')->on('users')->nullOnDelete();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['referred_by']);
        $table->dropColumn('referred_by');
    });
}

};
