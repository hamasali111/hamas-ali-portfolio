<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user   = auth()->user();
        $action = $request->input('_action', 'info');

        if ($action === 'photo') {
            $request->validate(['photo' => 'required|image|max:2048']);
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = $request->file('photo')->store('admin', 'public');
            $user->save();
            return back()->with('success', 'Profile photo updated successfully!');
        }

        if ($action === 'info') {
            $request->validate([
                'name'  => 'required|string|max:100',
                'email' => 'required|email|max:150|unique:users,email,' . $user->id,
            ]);
            $user->update(['name' => $request->name, 'email' => $request->email]);
            return back()->with('success', 'Profile information updated!');
        }

        if ($action === 'password') {
            $request->validate([
                'current_password'      => 'required',
                'password'              => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ]);
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
            }
            $user->update(['password' => Hash::make($request->password)]);
            return back()->with('success', 'Password changed successfully! Please log in again if needed.');
        }

        return back()->with('error', 'Unknown action.');
    }
}
