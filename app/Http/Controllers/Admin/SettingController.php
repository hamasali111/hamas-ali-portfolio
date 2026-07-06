<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'title'       => 'required|string|max:150',
            'tagline'     => 'nullable|string|max:200',
            'bio'         => 'nullable|string|max:1000',
            'email'       => 'nullable|email|max:150',
            'phone'       => 'nullable|string|max:30',
            'location'    => 'nullable|string|max:150',
            'github'      => 'nullable|url|max:300',
            'linkedin'    => 'nullable|url|max:300',
            'twitter'     => 'nullable|url|max:300',
            'years_exp'   => 'nullable|integer|min:0',
            'projects_done'=> 'nullable|integer|min:0',
            'clients_done' => 'nullable|integer|min:0',
            'photo'       => 'nullable|image|max:3072',
            'resume'         => 'nullable|file|mimes:pdf|max:5120',
            'reply_template' => 'nullable|string|max:2000',
        ]);

        if ($request->hasFile('photo')) {
            $old = Setting::get('photo');
            if ($old) Storage::disk('public')->delete($old);
            $validated['photo'] = $request->file('photo')->store('profile', 'public');
        }

        if ($request->hasFile('resume')) {
            $old = Setting::get('resume');
            if ($old) Storage::disk('public')->delete($old);
            $validated['resume'] = $request->file('resume')->store('profile', 'public');
        }

        Setting::setMany($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Settings saved!');
    }
}
