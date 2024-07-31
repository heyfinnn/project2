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
        Schema::create('tool_tasks', function (Blueprint $table) {
            $table->increments('tool_tasks_id');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('tool_id');
            $table->date('take_date');
            $table->date('return_date')->nullable();
            $table->date('assigned_date');
            $table->timestamps();

            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('tool_id')->references('tool_id')->on('tools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_tasks');
    }
};
