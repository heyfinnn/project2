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
        Schema::create('employee_tasks', function (Blueprint $table) {
            $table->id('employee_task_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->unsignedBigInteger('tool_id')->nullable();
            $table->date('assigned_date');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('asset_id')->references('asset_id')->on('assets')->onDelete('set null');
            $table->foreign('tool_id')->references('tool_id')->on('tools')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_tasks');
    }
};
