<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PluginStatusEnum;
use App\Enums\VulnerabilityStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plugin_info', function (Blueprint $table) {
            $table->id();
            $table->uuid('website_id');
            $table->string('plugin_name');
            $table->string('current_version');
            $table->string('latest_version');
            $table->enum('status', PluginStatusEnum::getValues());
            $table->enum('vulnerability_status', VulnerabilityStatusEnum::getValues());
            $table->string('vulnerability_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plugin_infos');
    }
};
