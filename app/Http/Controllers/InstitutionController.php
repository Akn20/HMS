<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Institution List Page
     */
    public function index(Request $request)
    {
        $query = Institution::query();

        // Search functionality
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $institutions = $query->latest()->paginate(10);

        return view('institutions.index', compact('institutions'));
    }

    /**
     * Show Add Institution Form
     */
public function create()
{
    $lastInstitution = Institution::withTrashed()->latest()->first();

    if ($lastInstitution) {
        $lastNumber = (int) substr($lastInstitution->code, 4);
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $nextCode = 'INST' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    /*
    ==========================================================
    FUTURE: FETCH ORGANIZATIONS (UNCOMMENT WHEN READY)
    ==========================================================

    use App\Models\Organization;

    $organizations = Organization::where('status', 'Active')->get();
    */

    /*
    ==========================================================
    FUTURE: FETCH MODULES (UNCOMMENT WHEN READY)
    ==========================================================

    use App\Models\Module;

    $modules = Module::where('status', 'Active')->get();
    */

    return view('institutions.create', compact('nextCode'));
}


    /**
     * Store Institution
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:institutions,code',
            'email' => 'nullable|email',
        ]);

        $data = $request->all();

        // Logo Upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['logo'] = $filename;
        }

        // MOU Upload
        if ($request->hasFile('mou_copy')) {
            $file = $request->file('mou_copy');
            $filename = time() . '_mou.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['mou_copy'] = $filename;
        }

        // Modules (convert array to JSON)
        if ($request->modules) {
            $data['modules'] = json_encode($request->modules);
        }

        Institution::create($data);

        return redirect()->route('institutions.index')
                         ->with('success', 'Institution Created Successfully');
    }

    /**
     * Show Edit Form
     */
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);

        return view('institutions.edit', compact('institution'));
    }

    /**
     * Update Institution
     */
    public function update(Request $request, $id)
    {
        $institution = Institution::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:institutions,code,' . $id,
        ]);

        $data = $request->all();

        // Logo Update
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['logo'] = $filename;
        }

        // MOU Update
        if ($request->hasFile('mou_copy')) {
            $file = $request->file('mou_copy');
            $filename = time() . '_mou.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['mou_copy'] = $filename;
        }

        if ($request->modules) {
            $data['modules'] = json_encode($request->modules);
        }

        $institution->update($data);

        return redirect()->route('institutions.index')
                         ->with('success', 'Institution Updated Successfully');
    }

    /**
     * Soft Delete Institution
     */
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();

        return redirect()->route('institutions.index')
                         ->with('success', 'Institution Deleted Successfully');
    }

    /**
     * Deleted Institutions List
     */
    public function deleted()
    {
        $institutions = Institution::onlyTrashed()->paginate(10);

        return view('institutions.deleted', compact('institutions'));
    }

    /**
     * Restore Deleted Institution
     */
    public function restore($id)
    {
        $institution = Institution::withTrashed()->findOrFail($id);
        $institution->restore();

        return redirect()->route('institutions.index')
                         ->with('success', 'Institution Restored Successfully');
    }

    /**
     * Permanently Delete
     */
    public function forceDelete($id)
    {
        $institution = Institution::withTrashed()->findOrFail($id);
        $institution->forceDelete();

        return redirect()->route('institutions.deleted')
                         ->with('success', 'Institution Permanently Deleted');
    }

    /**
     * Activate / Deactivate
     */
    public function toggleStatus($id)
    {
        $institution = Institution::findOrFail($id);

        $institution->status = $institution->status == 'Active'
                                ? 'Inactive'
                                : 'Active';

        $institution->save();

        return back()->with('success', 'Status Updated');
    }
    public function show($id)
{
    $institution = Institution::findOrFail($id);

    return view('institutions.show', compact('institution'));
}



}
