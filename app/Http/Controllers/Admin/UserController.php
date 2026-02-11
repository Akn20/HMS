<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('status', 1)->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'mobile' => 'required|unique:users',
        'role_id' => 'required',
        'mpin' => 'required|min:4'
    ]);

       User::create([
        'name' => $request->name,
        'mobile' => $request->mobile,
        'role_id' => $request->role_id,
        'mpin' => Hash::make($request->mpin),
    ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|digits:10|unique:users,mobile,' . $id,
        'role' => 'required|in:admin,user',
        'status' => 'required|boolean'
    ]);

    $user = User::findOrFail($id);
    $user->update($request->only('name', 'mobile', 'role', 'status'));

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}

}
