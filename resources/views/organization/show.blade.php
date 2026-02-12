@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <h5 class="m-b-10">Organization Details</h5>
    </div>
    <div class="page-header-right ms-auto">
        <a href="{{ route('organization.index') }}" class="btn btn-light-brand">
            ← Back to List
        </a>
    </div>
</div>

<div class="card stretch stretch-full">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $organization->name }}
            </div>
            <div class="col-md-6">
                <strong>Type:</strong> {{ $organization->type }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Email:</strong> {{ $organization->email }}
            </div>
            <div class="col-md-6">
                <strong>Contact:</strong> {{ $organization->contact_number }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Registration No:</strong> {{ $organization->registration_number }}
            </div>
            <div class="col-md-6">
                <strong>GST:</strong> {{ $organization->gst }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Status:</strong>
                <span class="badge bg-{{ $organization->status == 1 ? 'success' : 'danger' }}">
                    {{ $organization->status == 1 ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="col-md-6">
                <strong>Subscription Plan:</strong> {{ $organization->plan_type }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <strong>Address:</strong>
                {{ $organization->address }},
                {{ $organization->city }},
                {{ $organization->state }},
                {{ $organization->country }} -
                {{ $organization->pincode }}
            </div>
        </div>

    </div>
</div>

@endsection
