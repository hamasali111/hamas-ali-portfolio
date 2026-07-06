<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'level'       => 'required|integer|min:1|max:100',
            'icon'        => 'nullable|string|max:100',
            'category'    => 'required|string|max:100',
            'sort_order'  => 'nullable|integer',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'level'       => 'required|integer|min:1|max:100',
            'icon'        => 'nullable|string|max:100',
            'category'    => 'required|string|max:100',
            'sort_order'  => 'nullable|integer',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted.');
    }
}
