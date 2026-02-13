<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
     // Show Module List
    public function index()
    {
        $modules = Module::orderBy('priority')->get();
        return view('modules.index', compact('modules'));
    }

    // Show Create Module Form
   public function create()
    {
        $modules = Module::all(); // get existing modules
        return view('modules.create', compact('modules'));
    }

//Store Module
 public function store(Request $request)
    {
        $request->validate([
            'module_label' => 'required|unique:modules',
            'module_display_name' => 'required',
            'priority' => 'integer',
            'icon' => 'required',
            'file_url' => 'required',
            'page_name' => 'required',
            'type' => 'required',
            'access_for' => 'required'

        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')
            ->with('success', 'Module created successfully!');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('modules.index')
                        ->with('success', 'Module moved to trash.');
    }


    public function deleted()
    {
        $modules = Module::onlyTrashed()->get();
        return view('modules.deleted', compact('modules'));
    }

    public function restore($id)
    {
        Module::withTrashed()->find($id)->restore();

        return redirect()->route('modules.deleted')
                        ->with('success', 'Module restored successfully.');
    }

    public function forceDelete($id)
    {
        Module::withTrashed()->find($id)->forceDelete();

        return redirect()->route('modules.deleted')
                        ->with('success', 'Module permanently deleted.');
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $modules = Module::all(); // for parent dropdown

        return view('modules.edit', compact('module', 'modules'));
    }

   public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $request->validate([
            'module_label' => 'required|unique:modules,module_label,' . $id,
            'module_display_name' => 'required',
            'priority' => 'integer',
            'icon' => 'required',
            'file_url' => 'required',
            'page_name' => 'required',
            'type' => 'required',
            'access_for' => 'required'
        ]);

        $module->update($request->all());

        return redirect()->route('modules.index')
                        ->with('success', 'Module updated successfully!');
    }

    public function toggleStatus($id)
    {
        $module = Module::findOrFail($id);

        $module->status = !$module->status;
        $module->save();

        return back();
    }




    public function apiIndex()
    {
        return response()->json([
            'status' => true,
            'data' => \App\Models\Module::latest()->get()
        ]);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $module = \App\Models\Module::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Module created',
            'data' => $module
        ]);
    }

    public function apiUpdate(Request $request, $id)
    {
        $module = \App\Models\Module::findOrFail($id);
        $module->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Module updated'
        ]);
    }

    public function apiDelete($id)
    {
        $module = \App\Models\Module::findOrFail($id);
        $module->delete();

        return response()->json([
            'status' => true,
            'message' => 'Module deleted'
        ]);
    }
    public function apiShow($id)
    {
        $module = Module::findOrFail($id);
        return response()->json([
            'status' => true,
            'data' => $module
        ]);
    }
}
