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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id');

            $table->string('leave_type');

            $table->text('reason');

            $table->date('departure_date');

            $table->date('return_date');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'returned',
                'overdue'
            ])->default('pending');

            $table->unsignedBigInteger('approved_by')->nullable();

            $table->text('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};