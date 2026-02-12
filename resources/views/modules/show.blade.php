@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h5 class="m-b-10">Module Details</h5>
        </div>
        <div class="col text-end">
            <a href="{{ route('modules.index') }}" class="btn btn-sm btn-outline-primary">
                <i class="feather feather-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Module Label</th>
                <td>{{ $module->module_label }}</td>
            </tr>

            <tr>
                <th>Module Display Name</th>
                <td>{{ $module->module_display_name }}</td>
            </tr>

            <tr>
                <th>Parent Module</th>
                <td>{{ $module->parent_module ?? '-' }}</td>
            </tr>

            <tr>
                <th>Priority</th>
                <td>{{ $module->priority }}</td>
            </tr>

            <tr>
                <th>Icon</th>
                <td>{{ $module->icon }}</td>
            </tr>

            <tr>
                <th>File URL</th>
                <td>{{ $module->file_url }}</td>
            </tr>

            <tr>
                <th>Page Name</th>
                <td>{{ $module->page_name }}</td>
            </tr>

            <tr>
                <th>Type</th>
                <td>{{ ucfirst($module->type) }}</td>
            </tr>

            <tr>
                <th>Access For</th>
                <td>{{ ucfirst($module->access_for) }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($module->deleted_at)
                        <span class="badge bg-danger">Deleted</span>
                    @else
                        <span class="badge bg-success">Active</span>
                    @endif
                </td>
            </tr>
        </table>

    </div>
</div>

@endsection