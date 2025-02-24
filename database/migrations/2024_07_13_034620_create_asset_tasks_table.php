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
        Schema::create('asset_tasks', function (Blueprint $table) {
            $table->increments('asset_tasks_id');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('asset_id');
            $table->integer('value');
            $table->date('assigned_date');
            $table->timestamps();

            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('asset_id')->references('asset_id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_tasks');
    }
};
