<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile_view()
    {
        return view('pages.profile.index');
    }

    public function update_profile(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $user = User::findOrFail($userId);
        $user->name = $request->input('name');
        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }
}
