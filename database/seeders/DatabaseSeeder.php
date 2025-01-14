<?php

namespace Database\Seeders;

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
        $users = User::factory(10)->create();

        \App\Models\Invoice::factory(100)
            ->recycle($users)//recycle is going to assign a random user to each of the invoices which are created
            ->create();

    }
}
