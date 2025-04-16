<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = config('industry.industry');

        foreach ($industries as $industry) {
            Industry::create([
                'name' => $industry['name'],
            ]);
        }
    }
}
