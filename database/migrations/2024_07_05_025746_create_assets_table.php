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
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('asset_id');
            $table->string('asset_name');
            $table->text('description');
            $table->integer('stock');
            $table->date('purchase_date');
            $table->date('last_used_date')->nullable();
            $table->text('location');
            $table->enum('status', ['available', 'in use', 'maintenance']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
