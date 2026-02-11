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
            'name' => 'sometimes|required|unique:roles,name,',
            'description' => 'nullable|string',
            'status' => 'in:active,inactive'
        ]);

        $role->update($request->all());

        return response()->json(['message' => 'Role updated']);
    }

    public function index()
    {
        $roles = Roles::orderBy('name')->get(); 
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

}
