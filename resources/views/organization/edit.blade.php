@extends('dashboard')

@section('content')

<<<<<<< HEAD
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Organization</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('organization.index') }}">Organization</a>
            </li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>

    <div class="page-header-right ms-auto">
        <button type="submit" form="orgForm" class="btn btn-primary">
            <i class="feather-save me-2"></i> Update Organization
        </button>
    </div>
</div>

<div class="main-content">
    <form id="orgForm"
          method="POST"
          action="{{ route('organization.update', $organization->id) }}">
        @csrf
        @method('PUT')

        @include('organization.form')

    </form>
</div>

@endsection
=======
<h2>Edit Organization</h2>

<form method="POST" action="{{ route('organization.update',$organization->id) }}">
@csrf
@method('PUT')

<input class="form-control mb-2" name="name" value="{{ $organization->name }}">
<input class="form-control mb-2" name="type" value="{{ $organization->type }}">
<input class="form-control mb-2" name="email" value="{{ $organization->email }}">
<input class="form-control mb-2" name="plan_type" value="{{ $organization->plan_type }}">

<select class="form-control mb-2" name="status">
    <option value="1" {{ $organization->status ? 'selected' : '' }}>Active</option>
    <option value="0" {{ !$organization->status ? 'selected' : '' }}>Inactive</option>
</select>

<button class="btn btn-primary">Update</button>

</form>

@endsection
>>>>>>> origin/main
