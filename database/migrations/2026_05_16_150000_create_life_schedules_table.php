<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('life_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category', 80)->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('repeat', ['none', 'daily', 'weekly', 'monthly'])->default('none');
            // Untuk repeat=weekly, simpan nama hari aktif (mon,tue,...) sebagai csv.
            $table->string('repeat_days', 64)->nullable();
            $table->string('color', 16)->nullable();
            $table->timestamps();

            $table->index(['user_id', 'start_at']);
            $table->index(['user_id', 'repeat']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('life_schedules');
    }
};
