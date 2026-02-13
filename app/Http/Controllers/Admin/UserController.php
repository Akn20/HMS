<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can view the details'
            ], 403);
        }
        $users = User::with('role')->where('deleted_at', null)->get();
        return response()->json($users);
    }
    public function store(Request $request)
    {

        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can change the details'
            ], 403);
        }
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|digits:10|unique:users,mobile',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive'
        ]);

        User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'User created successfully']);
    }

    public function update(Request $request, $id)
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can change the details'
            ], 403);
        }
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'mobile' => 'sometimes|required|digits:10|unique:users,mobile,',
            'role_id' => 'sometimes|required|exists:roles,id',
            'status' => 'sometimes|required|in:active,inactive'
        ]);

        $user->update($request->only('name', 'mobile', 'email', 'role_id', 'status'));

        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can Delete Users'
            ], 403);
        }
        $user = User::findOrFail($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
    
    public function displayDeletedUsers(){
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can Delete Users'
            ], 403);
        }
        $deletedUsers = User::withTrashed()->whereNotNull('deleted_at')->get();
        if($deletedUsers->isEmpty()){
            return response()->json(['message' => 'No deleted users found'], 404);
        }   
        return response()->json($deletedUsers);
    }

    public function restore($id)
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can Restore Users'
            ], 403);
        }
        $user = User::withTrashed()->findOrFail($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->restore();

        return response()->json(['message' => 'User restored successfully']);
    }

    public function forceDeleteUser($id)
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can Permanently Delete Users'
            ], 403);
        }
        $user = User::withTrashed()->findOrFail($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->forceDelete();
        return response()->json(['message' => 'User permanently deleted']);
    }
}


