<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'tenant_id' => $tenant->id,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        Company::factory()->create([
            'tenant_id' => $tenant->id,
            'name' => 'Admin Company',
        ]);
    }
}
