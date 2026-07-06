<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Message;
use App\Models\PageVisit;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'skills'       => Skill::count(),
            'experiences'  => Experience::count(),
            'projects'     => Project::count(),
            'testimonials' => Testimonial::count(),
            'messages'     => Message::count(),
            'unread'       => Message::unread()->count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();

        $visitChart  = PageVisit::last30Days();
        $todayVisits = PageVisit::totalToday();
        $totalVisits = PageVisit::totalAllTime();

        return view('admin.dashboard', compact(
            'stats', 'recentMessages', 'visitChart', 'todayVisits', 'totalVisits'
        ));
    }
}
