<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionPlansSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('subscription_plans')
            ->insert([
                'id' => 1,
                'name' => 'Basic',
                'price' => 19.99,
                'features' => json_encode(['Custom Domain', 'Basic SEO', 'Limited Support']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('subscription_plans')
            ->insert([
                'id' => 2,
                'name' => 'Pro',
                'price' => 49.99,
                'features' => json_encode(['Custom Domain & Subdomain', 'Advanced SEO', '24/7 Support']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('subscription_plans')
            ->insert([
                'id' => 3,
                'name' => 'Business',
                'price' => 99.99,
                'features' => json_encode(['Custom Domain & Subdomain', 'Enterprise SEO', 'Premium Support']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
