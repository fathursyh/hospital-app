<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'super@admin.com',
            'role' => 'superadmin'
        ]);
        $plans = [
            [
                'name' => 'Starter',
                'price' => 199,
                'features' => [
                    'Basic analytics',
                    'Email support',
                    'Single user',
                    'Access to core features',
                ],
            ],
            [
                'name' => 'Professional',
                'price' => 399,
                'features' => [
                    'Advanced analytics',
                    'Priority email support',
                    'Up to 5 users',
                    'Integration with 3rd-party apps',
                ],
            ],
            [
                'name' => 'Enterprise',
                'price' => 799,
                'features' => [
                    'Full analytics & reports',
                    'Dedicated support manager',
                    'Unlimited users',
                    'Custom integrations',
                ],
            ],
        ];

        foreach ($plans as $plan) {
            Plan::factory()->create($plan);
        }
    }
}
