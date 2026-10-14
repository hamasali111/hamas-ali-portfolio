<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'n8n',               'level' => 92, 'icon' => 'fas fa-diagram-project', 'category' => 'Automation', 'sort_order' => 1],
            ['name' => 'WhatsApp API',      'level' => 88, 'icon' => 'fab fa-whatsapp',       'category' => 'Automation', 'sort_order' => 2],
            ['name' => 'AI Agents & LLMs',  'level' => 85, 'icon' => 'fas fa-robot',           'category' => 'Automation', 'sort_order' => 3],
            ['name' => 'Laravel',           'level' => 88, 'icon' => 'fab fa-laravel',        'category' => 'Backend',    'sort_order' => 4],
            ['name' => 'PHP',               'level' => 85, 'icon' => 'fab fa-php',            'category' => 'Backend',    'sort_order' => 5],
            ['name' => 'REST APIs',         'level' => 88, 'icon' => 'fas fa-plug',           'category' => 'Backend',    'sort_order' => 6],
            ['name' => 'Python',            'level' => 75, 'icon' => 'fab fa-python',         'category' => 'Backend',    'sort_order' => 7],
            ['name' => 'JavaScript',        'level' => 82, 'icon' => 'fab fa-js',             'category' => 'Frontend',   'sort_order' => 8],
            ['name' => 'MySQL',             'level' => 85, 'icon' => 'fas fa-database',       'category' => 'Database',   'sort_order' => 9],
            ['name' => 'Git & Docker',      'level' => 78, 'icon' => 'fab fa-docker',         'category' => 'DevOps',     'sort_order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create(array_merge($skill, ['is_featured' => true]));
        }
    }
}
