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
        Schema::create('client_info', function (Blueprint $table) {
            $table->id();
            $table->uuid('client_id')->unique();
            $table->string('name' , 150);
            $table->string('email' , 150);
            $table->string('phone' , 150);
            $table->string('url', 255)->unique();
            $table->string('logo_path', 150)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_info');
    }
};
