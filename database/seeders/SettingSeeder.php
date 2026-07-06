<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'name'         => 'Your Name',
            'title'        => 'Full Stack Developer',
            'tagline'      => 'I build things for the web.',
            'bio'          => 'Passionate full stack developer with expertise in building modern web applications. I love turning complex problems into simple, beautiful, and intuitive solutions.',
            'email'        => 'alihammasch@gmail.com',
            'phone'        => '+923089116512',
            'location'     => 'Pakistan',
            'github'       => 'https://github.com/',
            'linkedin'     => 'https://linkedin.com/',
            'twitter'      => 'https://twitter.com/',
            'years_exp'    => '3',
            'projects_done'=> '25',
            'clients_done' => '15',
            'photo'        => '',
            'resume'       => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
