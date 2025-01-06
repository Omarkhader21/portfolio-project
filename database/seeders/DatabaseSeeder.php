<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SocialMedia;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AboutMeAndSkill;
use Illuminate\Database\Seeder;
use App\Models\GeneralDeveloperInformation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);

        GeneralDeveloperInformation::factory(1)->create();
        AboutMeAndSkill::factory(3)->create();
        SocialMedia::factory(3)->create();
    }
}
