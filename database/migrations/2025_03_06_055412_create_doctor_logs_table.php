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
        Schema::create('doctor_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_doctor')->constrained('users', 'id');
            $table->foreignUuid('id_patient')->constrained('patients', 'id_patient');
            $table->timestamp('taken_at')->useCurrent();
            $table->timestamp('finished_at')->nullable()->default(null);
            $table->enum('status', ['progress', 'finished'])->default('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_logs');
    }
};
