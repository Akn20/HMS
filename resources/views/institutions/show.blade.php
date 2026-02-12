@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <h5 class="m-b-10">Institution Details</h5>
    </div>
    <div class="page-header-right ms-auto">
        <a href="{{ route('institutions.index') }}" class="btn btn-light-brand">
            ← Back to List
        </a>
    </div>
</div>

<div class="card stretch stretch-full">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $institution->name }}
            </div>
            <div class="col-md-6">
                <strong>Code:</strong> {{ $institution->code }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Email:</strong> {{ $institution->email }}
            </div>
            <div class="col-md-6">
                <strong>Contact:</strong> {{ $institution->contact_number }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Status:</strong> 
                <span class="badge bg-{{ $institution->status == 'Active' ? 'success' : 'danger' }}">
                    {{ $institution->status }}
                </span>
            </div>
            <div class="col-md-6">
                <strong>Subscription Plan:</strong> {{ $institution->subscription_plan }}
            </div>
        </div>

    </div>
</div>

@endsection