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
        Schema::create('site_info', function (Blueprint $table) {
            $table->id();
            $table->uuid('website_id')->unique();
            $table->uuid('client_id');
            $table->foreign('client_id')->references('client_id')->on('client_info')->onDelete('cascade');
            $table->string('site_name');
            $table->string('site_url')->unique();
            $table->string('site_ip');
            $table->string('site_admin_email');
            $table->string('ssl_status');
            $table->string('host_provider');
            $table->string('site_status');
            $table->string('wp_version');
            $table->string('php_version');
            $table->string('mysql_version');
            $table->string('server_software');
            $table->string('server_ip');
            $table->string('server_status');
            $table->string('health_status')->default('healthy');
            $table->string('server_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_info');
    }
};
