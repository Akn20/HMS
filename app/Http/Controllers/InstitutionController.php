<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Organization;
use App\Models\Module;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Institution List Page
     */
    public function index(Request $request)
    {
        $query = Institution::with(['organization', 'modules']);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $institutions = $query->latest()->paginate(10);

        return view('institutions.index', compact('institutions'));
    }

    /**
     * Show Add Institution Form
     */
    public function create()
    {
        $organizations = Organization::where('status', 1)->get();
        $modules = Module::orderBy('priority')->get();

        $lastInstitution = Institution::withTrashed()->latest()->first();

        $nextNumber = $lastInstitution
            ? ((int) substr($lastInstitution->code, 4)) + 1
            : 1;

        $nextCode = 'INST' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return view('institutions.create', compact(
            'nextCode',
            'organizations',
            'modules'
        ));
    }

    /**
     * Store Institution
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'code' => 'required|unique:institutions,code',
            'modules' => 'nullable|array',
            'modules.*' => 'exists:modules,id',
        ]);

        $data = $request->only([
            'organization_id',
            'name',
            'code',
            'gst_number',
            'email',
            'contact_number',
            'address',
            'city',
            'state',
            'country',
            'pincode',
            'institution_url',
            'login_template',
            'default_language',
            'admin_name',
            'admin_email',
            'admin_mobile',
            'status',
        ]);

        // File Uploads
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['logo'] = $filename;
        }

        if ($request->hasFile('mou_copy')) {
            $file = $request->file('mou_copy');
            $filename = time() . '_mou.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['mou_copy'] = $filename;
        }

        $institution = Institution::create($data);

        // ✅ Sync modules (Pivot table)
        if ($request->modules) {
            $institution->modules()->sync($request->modules);
        }

        return redirect()->route('institutions.index')
            ->with('success', 'Institution Created Successfully');
    }

    /**
     * Show Edit Form
     */
    public function edit($id)
    {
        $institution = Institution::with('modules')->findOrFail($id);
        $organizations = Organization::where('status', 1)->get();
        $modules = Module::orderBy('priority')->get();

        return view('institutions.edit', compact(
            'institution',
            'organizations',
            'modules'
        ));
    }

    /**
     * Update Institution
     */
    public function update(Request $request, $id)
    {
        $institution = Institution::findOrFail($id);

        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'code' => 'required|unique:institutions,code,' . $id,
            'modules' => 'nullable|array',
            'modules.*' => 'exists:modules,id',
        ]);

        $data = $request->only([
            'organization_id',
            'name',
            'code',
            'gst_number',
            'email',
            'contact_number',
            'address',
            'city',
            'state',
            'country',
            'pincode',
            'institution_url',
            'login_template',
            'default_language',
            'admin_name',
            'admin_email',
            'admin_mobile',
            'status',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['logo'] = $filename;
        }

        if ($request->hasFile('mou_copy')) {
            $file = $request->file('mou_copy');
            $filename = time() . '_mou.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['mou_copy'] = $filename;
        }

        $institution->update($data);

        // ✅ Sync modules (update pivot)
        $institution->modules()->sync($request->modules ?? []);

        return redirect()->route('institutions.index')
            ->with('success', 'Institution Updated Successfully');
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        Institution::findOrFail($id)->delete();

        return redirect()->route('institutions.index')
            ->with('success', 'Institution Deleted Successfully');
    }

    public function show($id)
    {
        $institution = Institution::with(['organization', 'modules'])->findOrFail($id);

        return view('institutions.show', compact('institution'));
    }



    /**
     * ================= API SECTION =================
     */

    public function apiIndex()
    {
        return response()->json([
            'status' => true,
            'message' => 'Institution list fetched successfully',
            'data' => Institution::with('organization')->latest()->get()
        ]);
    }

    public function apiShow($id)
    {
        $institution = Institution::with('organization')->find($id);

        if (!$institution) {
            return response()->json([
                'status' => false,
                'message' => 'Institution not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $institution
        ]);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required',
            'code' => 'required|unique:institutions,code',
        ]);

        $institution = Institution::create($request->only([
    'organization_id',
    'name',
    'code',
    'gst_number',
    'email',
    'contact_number',
    'address',
    'city',
    'state',
    'country',
    'pincode',
    'institution_url',
    'login_template',
    'default_language',
    'admin_name',
    'admin_email',
    'admin_mobile',
    'status',
]));


        return response()->json([
            'status' => true,
            'message' => 'Institution created successfully',
            'data' => $institution
        ], 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $institution = Institution::find($id);

        if (!$institution) {
            return response()->json([
                'status' => false,
                'message' => 'Institution not found'
            ], 404);
        }

        $institution->update($request->only([
    'organization_id',
    'name',
    'code',
    'gst_number',
    'email',
    'contact_number',
    'address',
    'city',
    'state',
    'country',
    'pincode',
    'institution_url',
    'login_template',
    'default_language',
    'admin_name',
    'admin_email',
    'admin_mobile',
    'status',
]));


        return response()->json([
            'status' => true,
            'message' => 'Institution updated successfully',
            'data' => $institution
        ]);
    }

    public function apiDelete($id)
    {
        $institution = Institution::find($id);

        if (!$institution) {
            return response()->json([
                'status' => false,
                'message' => 'Institution not found'
            ], 404);
        }

        $institution->delete();

        return response()->json([
            'status' => true,
            'message' => 'Institution deleted successfully'
        ]);
    }
}
