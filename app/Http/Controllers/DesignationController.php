<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::latest()->get();
        return view('masters.designation.index', compact('designations'));
    }

    public function create()
    {
        return view('masters.designation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation_name' => 'required|max:100',
            'status' => 'required'
        ]);

        $code = strtoupper(substr($request->designation_name, 0, 3));

        Designation::create([
            'id' => Str::uuid(),
            'designation_code' => $code,
            'designation_name' => $request->designation_name,
            'department_id' => $request->department_id,
            'description' => $request->description,
            'status' => $request->status,
            'created_by' => Str::uuid()
        ]);

        return redirect()->route('masters.designation.index')
            ->with('success', 'Designation created successfully');
    }


    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('masters.designation.edit', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        $designation = Designation::findOrFail($id);

        $designation->update([
            'designation_code' => strtoupper($request->designation_code),
            'designation_name' => $request->designation_name,
            'description' => $request->description,
            'status' => $request->status,
            'updated_by' => Str::uuid()
        ]);

        return redirect()->route('masters.designation.index')
            ->with('success', 'Designation updated successfully');
    }

    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('masters.designation.index')
            ->with('success', 'Designation deleted successfully');
    }

    public function trash()
    {
        $designations = Designation::onlyTrashed()->get();
        return view('master.designation.trash', compact('designations'));
    }

    public function restore($id)
    {
        Designation::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('designation.trash')
            ->with('success', 'Designation restored');
    }

    public function forceDelete($id)
    {
        Designation::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('designation.trash')
            ->with('success', 'Designation removed permanently');
    }


}

