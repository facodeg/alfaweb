<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_target_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_target_id')->constrained()->cascadeOnDelete();
            $table->foreignId('requested_by_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reviewed_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->json('proposed_changes');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();

            $table->index(['work_target_id', 'status']);
            $table->index(['requested_by_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_target_change_requests');
    }
};
