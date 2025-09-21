<?php

use App\GenderEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignUuid('hospital_id')->constrained('hospitals')->onDelete('cascade');
            $table->string('name');
            $table->date('date_of_birth');
            $table->enum('gender', array_map(fn(GenderEnum $type) => $type->value, GenderEnum::cases()))->default(GenderEnum::Man->value);
            $table->string('contact')->unique();
            $table->string('address')->nullable();
            $table->text('medical_history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
