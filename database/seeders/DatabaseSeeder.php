<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            TestimonialSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
