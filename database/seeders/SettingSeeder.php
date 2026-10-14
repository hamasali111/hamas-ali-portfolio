<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'name'         => 'Hamas Ali',
            'title'        => 'Laravel Developer & n8n Automation Expert',
            'tagline'      => 'I build websites — and automate the business behind them.',
            'bio'          => "I'm Hamas Ali, a Laravel web developer and n8n automation expert from Pakistan. I build modern web applications and AI-powered automation systems — from WhatsApp AI agents that take orders while you sleep, to n8n workflows that run your back office on autopilot.",
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
