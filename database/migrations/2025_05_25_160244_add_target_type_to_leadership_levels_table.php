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
    Schema::table('leadership_levels', function (Blueprint $table) {
        $table->string('target_type')->nullable()->after('target_count');
    });
}

public function down()
{
    Schema::table('leadership_levels', function (Blueprint $table) {
        $table->dropColumn('target_type');
    });
}

};
