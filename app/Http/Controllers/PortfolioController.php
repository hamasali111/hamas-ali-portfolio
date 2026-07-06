<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get()->groupBy('category');
        $experiences = Experience::ordered()->get();
        $projects = Project::ordered()->get();
        $testimonials = Testimonial::featured()->ordered()->get();
        $settings = Setting::all()->pluck('value', 'key');

        return view('portfolio.index', compact('skills', 'experiences', 'projects', 'testimonials', 'settings'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        Message::create($validated);

        try {
            Mail::to('alihammasch@gmail.com')->send(new ContactMail($validated));
        } catch (\Exception $e) {
            // Mail failed silently — message still saved to DB
        }

        return back()->with('success', 'Thank you! Your message has been sent. I\'ll get back to you soon.');
    }
}
