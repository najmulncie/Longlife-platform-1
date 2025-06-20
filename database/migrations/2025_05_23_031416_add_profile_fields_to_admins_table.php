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
    Schema::table('admins', function (Blueprint $table) {
        $table->string('profile_photo')->nullable();
        $table->string('phone')->nullable();
    });
}

public function down()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->dropColumn(['profile_photo', 'phone']);
    });
}

};
