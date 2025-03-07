<?php

namespace Database\Seeders;

use App\Models\Avatars;
use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        User::factory()->has(Avatars::factory())->count(6)->create();
        Patient::factory()->count(70)->create();
    }
}
