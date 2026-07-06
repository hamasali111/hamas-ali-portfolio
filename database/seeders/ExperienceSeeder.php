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
                'title'       => 'Senior Full Stack Developer',
                'company'     => 'Tech Solutions Inc.',
                'location'    => 'Lahore, Pakistan',
                'start_date'  => '2022-01-01',
                'end_date'    => null,
                'is_current'  => true,
                'description' => 'Leading development of enterprise web applications using Laravel and Vue.js. Architected scalable RESTful APIs serving 50k+ daily users. Mentored a team of 4 junior developers.',
                'type'        => 'work',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Full Stack Developer',
                'company'     => 'Digital Agency Co.',
                'location'    => 'Karachi, Pakistan',
                'start_date'  => '2020-06-01',
                'end_date'    => '2021-12-31',
                'is_current'  => false,
                'description' => 'Built and maintained 15+ client websites and e-commerce platforms. Implemented payment gateways, CMS systems, and third-party API integrations. Reduced page load times by 40%.',
                'type'        => 'work',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'BS Computer Science',
                'company'     => 'COMSATS University',
                'location'    => 'Islamabad, Pakistan',
                'start_date'  => '2016-09-01',
                'end_date'    => '2020-05-31',
                'is_current'  => false,
                'description' => 'Bachelor of Science in Computer Science. Graduated with distinction. Final year project: AI-powered web content management system using Laravel and Python.',
                'type'        => 'education',
                'sort_order'  => 3,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
