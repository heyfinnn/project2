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
        Schema::create('task_assets', function (Blueprint $table) {
            $table->id('task_asset_id');
            $table->foreignId('task_id')->constrained('tasks', 'task_id');
            $table->foreignId('asset_id')->constrained('assets', 'asset_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assets');
    }
};
