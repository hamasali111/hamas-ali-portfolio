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
                'name'         => 'E-Commerce Platform',
                'description'  => 'A full-featured multi-vendor e-commerce platform with real-time inventory, payment gateway integration, and an admin dashboard for managing products, orders, and customers.',
                'category'     => 'Web',
                'url'          => 'https://example.com',
                'github_url'   => 'https://github.com/',
                'technologies' => 'Laravel, Vue.js, MySQL, Stripe, Redis',
                'is_featured'  => true,
                'sort_order'   => 1,
            ],
            [
                'name'         => 'Task Management App',
                'description'  => 'A collaborative project management tool with real-time updates, Kanban boards, team collaboration features, and detailed analytics dashboard.',
                'category'     => 'Web',
                'url'          => 'https://example.com',
                'github_url'   => 'https://github.com/',
                'technologies' => 'Laravel, React, Pusher, MySQL, Tailwind CSS',
                'is_featured'  => true,
                'sort_order'   => 2,
            ],
            [
                'name'         => 'Restaurant POS System',
                'description'  => 'A point-of-sale system for restaurants with order management, table tracking, kitchen display, inventory control, and financial reporting.',
                'category'     => 'Web',
                'url'          => null,
                'github_url'   => 'https://github.com/',
                'technologies' => 'Laravel, jQuery, MySQL, Bootstrap',
                'is_featured'  => false,
                'sort_order'   => 3,
            ],
            [
                'name'         => 'Social Media Dashboard',
                'description'  => 'A unified social media management dashboard to schedule posts, track analytics, and manage multiple accounts from one interface.',
                'category'     => 'Dashboard',
                'url'          => 'https://example.com',
                'github_url'   => 'https://github.com/',
                'technologies' => 'Laravel, Vue.js, Chart.js, Tailwind CSS',
                'is_featured'  => true,
                'sort_order'   => 4,
            ],
        ];

        foreach ($projects as $p) {
            Project::create($p);
        }
    }
}
