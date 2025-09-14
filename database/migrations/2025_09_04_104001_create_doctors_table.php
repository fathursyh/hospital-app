<?php

use App\SpecializationEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('hospital_id')->constrained('hospitals')->onDelete('cascade');
            $table->enum('specialization', array_map(fn(SpecializationEnum $type)=> $type->value, SpecializationEnum::cases()));
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'hospital_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
