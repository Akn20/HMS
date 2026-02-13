<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
         $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can create roles'
            ], 403);
        }
        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        Roles::create($request->all());

        return response()->json(['message' => 'Role created']);
    }

    public function update(Request $request, $id)
    {
         $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can change the details'
            ], 403);
        }
        $role = Roles::findOrFail($id);
        if(!$role){
            return response()->json(['message' => 'Role not found'], 404);
        }
      
        $request->validate([
            'name' => 'sometimes|required',
            'description' => 'nullable|string',
            'status' => 'in:active,inactive'
        ]);

        $role->update($request->all());

        return response()->json(['message' => 'Role updated']);
    }

    public function index()
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can delete roles'
            ], 403);
        }
        $roles = Roles::orderBy('name')->where('deleted_at', null)->get(); 
        if($roles->isEmpty()){
            return response()->json(['message' => 'No roles found'], 404);
        }
        return response()->json($roles);
    }

    public function destroy($id)
    {
         $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can delete roles'
            ], 403);
        }
        $role = Roles::findOrFail($id);
        if(!$role){
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->delete();
        return response()->json(['message' => 'Role deleted']);
    }

    public function displayDeletedRoles(){
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can delete roles'
            ], 403);
        }
        $deletedRoles = Roles::withTrashed()->whereNotNull('deleted_at')->get();
        if($deletedRoles->isEmpty()){
            return response()->json(['message' => 'No deleted roles found'], 404);
        }
        return response()->json($deletedRoles);
    }

    public function restore($id)
    {
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can restore roles'
            ], 403);
        }
        $role = Roles::withTrashed()->findOrFail($id);
        if(!$role){
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->restore();

        return response()->json(['message' => 'Role restored successfully']);
    }   

    public function forceDeleteRole($id){
        $authUser = auth()->user();
        if ($authUser->role->name !== 'admin') {
            return response()->json([
                'message' => 'Only admin can Permanently delete roles'
            ], 403);
        }
        $role = Roles::withTrashed()->findOrFail($id);
        if(!$role){
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->forceDelete();

        return response()->json(['message' => 'Role permanently deleted successfully']);
    }
}