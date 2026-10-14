<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'title'       => 'n8n AI Automation Teacher',
                'company'     => 'Al-Hayat College',
                'location'    => 'Bahawalnagar, Pakistan',
                'start_date'  => '2026-10-01',
                'end_date'    => null,
                'is_current'  => true,
                'description' => 'Teaching practical n8n and AI-agent skills — students build real WhatsApp automations and workflows for freelancing and careers.',
                'type'        => 'work',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'AI Automation Developer',
                'company'     => 'Freelance / Self-employed',
                'location'    => 'Pakistan (Remote)',
                'start_date'  => '2026-01-01',
                'end_date'    => null,
                'is_current'  => true,
                'description' => 'Building custom AI automation systems for businesses: WhatsApp AI ordering agents, n8n workflows, and order-management automation. Case study: Cafe Doozy restaurant automation.',
                'type'        => 'work',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'BS Computer Science',
                'company'     => 'The Islamia University of Bahawalpur (Bahawalnagar Campus)',
                'location'    => 'Bahawalnagar, Pakistan',
                'start_date'  => '2023-09-01',
                'end_date'    => '2027-06-30',
                'is_current'  => false,
                'description' => 'Bachelor of Science in Computer Science. Final year project: AI-based traffic monitoring and violation detection system using YOLOv8 and DeepSORT.',
                'type'        => 'education',
                'sort_order'  => 3,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
