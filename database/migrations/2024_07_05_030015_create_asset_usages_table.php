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
        Schema::create('asset_usages', function (Blueprint $table) {
            $table->id('usage_id');
            $table->foreignId('asset_id')->constrained('assets', 'asset_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id');
            $table->date('use_date');
            $table->date('return_date')->nullable();
            $table->text('purpose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_usages');
    }
};
