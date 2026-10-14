<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name'         => 'Cafe Doozy — WhatsApp AI Ordering Automation',
                'description'  => 'AI-powered WhatsApp ordering agent for a Pakistani restaurant: takes orders conversationally in Roman Urdu, confirms them, saves to Google Sheets and notifies the manager — built with n8n.',
                'category'     => 'Automation',
                'url'          => null,
                'github_url'   => null,
                'technologies' => 'n8n, WhatsApp API, AI Agent, Google Sheets',
                'is_featured'  => true,
                'sort_order'   => 1,
            ],
            [
                'name'         => 'AI Traffic Monitoring & Violation Detection',
                'description'  => 'Final-year project: real-time vehicle tracking with over-speed and wrong-way detection plus e-challan generation, powered by YOLOv8 and DeepSORT.',
                'category'     => 'AI',
                'url'          => null,
                'github_url'   => null,
                'technologies' => 'Python, YOLOv8, DeepSORT, OpenCV, Streamlit',
                'is_featured'  => true,
                'sort_order'   => 2,
            ],
            [
                'name'         => 'Web Security & Scam Detection Tool',
                'description'  => 'Scans websites for phishing and scam signals — SSL, domain age, blacklists and content analysis with an ML verdict engine, plus a browser extension.',
                'category'     => 'Web',
                'url'          => null,
                'github_url'   => null,
                'technologies' => 'Python, Flask, SQLite, JavaScript',
                'is_featured'  => true,
                'sort_order'   => 3,
            ],
            [
                'name'         => 'YouTube Channel Scraper (n8n)',
                'description'  => 'n8n workflow that scrapes YouTube channel stats, business emails and websites into Google Sheets for lead generation.',
                'category'     => 'Automation',
                'url'          => null,
                'github_url'   => null,
                'technologies' => 'n8n, YouTube API, Google Sheets',
                'is_featured'  => false,
                'sort_order'   => 4,
            ],
        ];

        foreach ($projects as $p) {
            Project::create($p);
        }
    }
}
