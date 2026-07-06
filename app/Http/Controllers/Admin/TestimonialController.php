<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'role'        => 'required|string|max:100',
            'company'     => 'nullable|string|max:100',
            'content'     => 'required|string',
            'avatar'      => 'nullable|image|max:2048',
            'rating'      => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'role'        => 'required|string|max:100',
            'company'     => 'nullable|string|max:100',
            'content'     => 'required|string',
            'avatar'      => 'nullable|image|max:2048',
            'rating'      => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) {
                Storage::disk('public')->delete($testimonial->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) {
            Storage::disk('public')->delete($testimonial->avatar);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }
}
