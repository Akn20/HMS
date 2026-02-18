<<<<<<< HEAD
@extends('layouts.admin')

@section('content')

    <div class="page-header">
        <div class="page-header-left">
            <h5 class="m-b-10">Organizations</h5>
        </div>
        <div class="page-header-right ms-auto d-flex gap-2">

            {{-- Search --}}
            <form method="GET" action="{{ route('organization.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search Organization"
                    value="{{ request('search') }}">
                <button class="btn btn-light-brand btn-sm">
                    <i class="feather-search"></i>
                </button>
            </form>

            {{-- Add --}}
            <a href="{{ route('organization.create') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Organization
            </a>

            {{-- Deleted --}}
            <a href="{{ route('organization.deleted') }}" class="btn btn-danger btn-sm">
                Deleted Organizations
            </a>

        </div>
    </div>


    <div class="main-content">
        <div class="card stretch stretch-full">
            <div class="card-body custom-card-action p-0">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="border-b">
                                <th>Sl.No</th>
                                <th>Organization Name</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($organizations as $organization)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $organization->name }}</td>
                                    <td>{{ $organization->type }}</td>
                                    <td>{{ $organization->email }}</td>
                                    <td>
                                        <span class="badge bg-soft-primary text-primary">
                                            {{ $organization->plan_type }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($organization->status == 1)
                                            <span class="badge bg-soft-success text-success">Active</span>
                                        @else
                                            <span class="badge bg-soft-danger text-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <div class="hstack gap-2 justify-content-end">

                                            {{-- View --}}
                                            <a href="{{ route('organization.show', $organization->id) }}"
                                                class="avatar-text avatar-md" data-bs-toggle="tooltip" title="View">
                                                <i class="feather feather-eye"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('organization.edit', $organization->id) }}"
                                                class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Edit">
                                                <i class="feather feather-edit"></i>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('organization.destroy', $organization->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this organization?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="avatar-text avatar-md d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="feather feather-trash-2"></i>
                                                </button>
                                            </form>

                                            <!--Status Toggle-->
                                            <form action="{{ route('organization.toggleStatus', $organization->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit"
                                                    class="status-toggle {{ $organization->status ? 'active' : 'inactive' }}">
                                                    <span>
                                                        {{ $organization->status ? 'Deactivate' : 'Activate' }}
                                                    </span>
                                                </button>
                                            </form>


                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        No Organizations Found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer">
                {{ $organizations->links() }}
            </div>
        </div>
    </div>

@endsection
=======
@extends('dashboard')

@section('content')



        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-0">Organizations</h5>
                </div>
                <ul class="breadcrumb ms-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('organization.index') }}">Organization</a>
                    </li>
                    <li class="breadcrumb-item">List</li>
                </ul>
            </div>

            <div class="page-header-right ms-auto">
                <a href="{{ route('organization.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i> New Organization
                </a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row g-4 mb-4">

            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h6 class="text-muted">Total Organizations</h6>
                        <h3 class="fw-bold mb-0">{{ $organizations->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h6 class="text-muted">Active</h6>
                        <h3 class="fw-bold text-success mb-0">
                            {{ $organizations->where('status',1)->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <h6 class="text-muted">Inactive</h6>
                        <h3 class="fw-bold text-danger mb-0">
                            {{ $organizations->where('status',0)->count() }}
                        </h3>
                    </div>
                </div>
            </div>

        </div>

        <!-- Organization Table -->
        <div class="row">
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Organization</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($organizations as $org)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <div class="fw-bold">{{ $org->name }}</div>
                                            <small class="text-muted">{{ $org->city }}</small>
                                        </td>

                                        <td>{{ $org->type }}</td>

                                        <td>{{ $org->email }}</td>

                                        <td>
                                            <span class="badge bg-soft-primary text-primary">
                                                {{ $org->plan_type }}
                                            </span>
                                        </td>

                                        <td>
                                            @if($org->status)
                                                <span class="badge bg-soft-success text-success">
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-soft-danger text-danger">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-end">
                                            <div class="dropdown">
                                                <button class="btn btn-light btn-sm"
                                                        data-bs-toggle="dropdown">
                                                    <i class="feather-more-horizontal"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('organization.edit',$org->id) }}">
                                                            <i class="feather-edit me-2"></i> Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('organization.destroy',$org->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="dropdown-item text-danger">
                                                                <i class="feather-trash-2 me-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center p-4">
                                            No Organizations Found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    


@endsection
>>>>>>> origin/main
