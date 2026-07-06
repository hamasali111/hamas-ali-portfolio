<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:150',
            'description'  => 'required|string',
            'image'        => 'nullable|image|max:4096',
            'category'     => 'required|string|max:100',
            'url'          => 'nullable|url|max:500',
            'github_url'   => 'nullable|url|max:500',
            'technologies' => 'nullable|string|max:500',
            'is_featured'  => 'boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project added!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:150',
            'description'  => 'required|string',
            'image'        => 'nullable|image|max:4096',
            'category'     => 'required|string|max:100',
            'url'          => 'nullable|url|max:500',
            'github_url'   => 'nullable|url|max:500',
            'technologies' => 'nullable|string|max:500',
            'is_featured'  => 'boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
