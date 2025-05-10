<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = ['Admin', 'Manager', 'Guest User', 'License-Seeking Diver', 'Instructor', 'Research Diver'];
        return view('userlist', compact('users', 'roles'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Role updated successfully.');
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);

        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.users')->with('error', 'You cannot delete your own account.');
        }
    
        $user->delete();
    
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        }
}
