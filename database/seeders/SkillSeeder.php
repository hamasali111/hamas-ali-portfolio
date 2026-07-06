<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP',        'level' => 90, 'icon' => 'fab fa-php',       'category' => 'Backend',   'sort_order' => 1],
            ['name' => 'Laravel',    'level' => 88, 'icon' => 'fab fa-laravel',   'category' => 'Backend',   'sort_order' => 2],
            ['name' => 'JavaScript', 'level' => 85, 'icon' => 'fab fa-js',        'category' => 'Frontend',  'sort_order' => 3],
            ['name' => 'Vue.js',     'level' => 80, 'icon' => 'fab fa-vuejs',     'category' => 'Frontend',  'sort_order' => 4],
            ['name' => 'React',      'level' => 75, 'icon' => 'fab fa-react',     'category' => 'Frontend',  'sort_order' => 5],
            ['name' => 'MySQL',      'level' => 85, 'icon' => 'fas fa-database',  'category' => 'Database',  'sort_order' => 6],
            ['name' => 'HTML/CSS',   'level' => 95, 'icon' => 'fab fa-html5',     'category' => 'Frontend',  'sort_order' => 7],
            ['name' => 'Git',        'level' => 82, 'icon' => 'fab fa-git-alt',   'category' => 'DevOps',    'sort_order' => 8],
            ['name' => 'Docker',     'level' => 65, 'icon' => 'fab fa-docker',    'category' => 'DevOps',    'sort_order' => 9],
            ['name' => 'Python',     'level' => 70, 'icon' => 'fab fa-python',    'category' => 'Backend',   'sort_order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create(array_merge($skill, ['is_featured' => true]));
        }
    }
}
