<?php

use App\HospitalTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('address');
            $table->string('license')->unique();
            $table->string('website')->nullable();
            $table->enum('type', array_map(fn(HospitalTypeEnum $type) => $type->value, HospitalTypeEnum::cases()))->default(HospitalTypeEnum::Private);
            $table->string('phone')->unique();
            $table->enum('subscription_status', ['active', 'inactive', 'trial'])->default('trial');
            $table->foreignUuid('admin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
