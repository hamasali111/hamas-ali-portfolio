<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name'        => 'Sarah Johnson',
                'role'        => 'CEO',
                'company'     => 'StartupXYZ',
                'content'     => 'Absolutely incredible work! The portfolio website delivered exceeded all our expectations. Clean code, on-time delivery, and excellent communication throughout the project.',
                'rating'      => 5,
                'is_featured' => true,
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Ahmed Khan',
                'role'        => 'Product Manager',
                'company'     => 'TechCorp',
                'content'     => 'Highly professional developer who truly understands the business requirements. The e-commerce platform built increased our sales by 35% in the first month!',
                'rating'      => 5,
                'is_featured' => true,
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Emily Davis',
                'role'        => 'Marketing Director',
                'company'     => 'BrandBoost',
                'content'     => 'Working with this developer was a pleasure from start to finish. Great attention to detail, responsive to feedback, and delivered a beautiful, functional website.',
                'rating'      => 5,
                'is_featured' => true,
                'sort_order'  => 3,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
