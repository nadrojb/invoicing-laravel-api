<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Industry;
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


        $this->call([
            IndustrySeeder::class,
        ]);

        $company = Company::factory()->create([
            'industry_id' => Industry::inRandomOrder()->first()->id,
            'name' => 'Admin Company',
        ]);

        User::factory()->create([
            'name' => 'Super Admin',
            'last_name' => 'Admin',
            'company_id' => $company->id,
            'email' => 'admin@admin.com',
            'password' => bcrypt('Password123'),
        ]);
    }
}
