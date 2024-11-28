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
        Schema::table('plugin_info', function (Blueprint $table) {
            $table->foreign('website_id')->references('website_id')->on('site_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plugin_info', function (Blueprint $table) {
            $table->dropForeign(['website_id']);
        });
    }
};
