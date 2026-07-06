<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::ordered()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:150',
            'company'     => 'required|string|max:150',
            'location'    => 'nullable|string|max:150',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'is_current'  => 'boolean',
            'description' => 'required|string',
            'type'        => 'required|in:work,education',
            'sort_order'  => 'nullable|integer',
        ]);

        $validated['is_current'] = $request->boolean('is_current');
        if ($validated['is_current']) {
            $validated['end_date'] = null;
        }

        Experience::create($validated);
        return redirect()->route('admin.experiences.index')->with('success', 'Experience added!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:150',
            'company'     => 'required|string|max:150',
            'location'    => 'nullable|string|max:150',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'is_current'  => 'boolean',
            'description' => 'required|string',
            'type'        => 'required|in:work,education',
            'sort_order'  => 'nullable|integer',
        ]);

        $validated['is_current'] = $request->boolean('is_current');
        if ($validated['is_current']) {
            $validated['end_date'] = null;
        }

        $experience->update($validated);
        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted.');
    }
}
