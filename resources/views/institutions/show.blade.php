@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-header-left">
        <h5 class="m-b-10">View Institution</h5>
    </div>
    <div class="page-header-right">
        <a href="{{ route('institutions.index') }}" class="btn btn-secondary">
            <i class="feather-arrow-left me-2"></i> Back to List
        </a>
    </div>
</div>

<div class="main-content">
<div class="row">

{{-- ================= CORE DETAILS ================= --}}
<div class="col-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">1. Institution Details</h5>
        </div>
        <div class="card-body row g-3">

            <div class="col-md-6">
                <label class="form-label">Institution Name</label>
                <p class="form-control-plaintext">{{ $institution->name }}</p>
            </div>

            <div class="col-md-6">
                <label class="form-label">Institution Code</label>
                <p class="form-control-plaintext">{{ $institution->code }}</p>
            </div>

            <div class="col-md-6">
                <label class="form-label">Organization Name</label>
                <p class="form-control-plaintext">
    {{ $institution->organization->name ?? '-' }}
</p>

            </div>

            <div class="col-md-6">
                <label class="form-label">GST Number</label>
                <p class="form-control-plaintext">{{ $institution->gst_number ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <p class="form-control-plaintext">{{ $institution->email ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label class="form-label">Contact Number</label>
                <p class="form-control-plaintext">{{ $institution->contact_number ?? '-' }}</p>
            </div>

            <div class="col-md-12">
                <label class="form-label">Address</label>
                <p class="form-control-plaintext">{{ $institution->address ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>City</label>
                <p class="form-control-plaintext">{{ $institution->city ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>State</label>
                <p class="form-control-plaintext">{{ $institution->state ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Country</label>
                <p class="form-control-plaintext">{{ $institution->country ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Pincode</label>
                <p class="form-control-plaintext">{{ $institution->pincode ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label>Timezone</label>
                <p class="form-control-plaintext">{{ $institution->timezone ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label class="text-muted small">Status</label>
                <div>
                    @if($institution->status)
                        <span class="text-success fw-semibold">Active</span>
                    @else
                        <span class="text-danger fw-semibold">Inactive</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ================= BRANDING ================= --}}
<div class="col-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">2. Access & Branding</h5>
        </div>
        <div class="card-body row g-3">

            <div class="col-md-6">
                <label>Institution URL</label>
                <p class="form-control-plaintext">{{ $institution->institution_url ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label>Login Template</label>
                <p class="form-control-plaintext">{{ $institution->login_template ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label>Default Language</label>
                <p class="form-control-plaintext">{{ $institution->default_language ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <label>Logo</label><br>
                @if($institution->logo)
                    <img src="{{ asset('uploads/'.$institution->logo) }}" width="120">
                @else
                    -
                @endif
            </div>

        </div>
    </div>
</div>

{{-- ================= ADMIN ================= --}}
<div class="col-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">3. Admin & Control</h5>
        </div>
        <div class="card-body row g-3">

            <div class="col-md-4">
                <label>Admin Name</label>
                <p class="form-control-plaintext">{{ $institution->admin_name ?? '-' }}</p>
            </div>
            
            <div class="col-md-6">
    <label class="form-label">Modules</label>
    <p class="form-control-plaintext">
        @if($institution->modules && $institution->modules->count())
            {{ $institution->modules->pluck('module_display_name')->implode(', ') }}
        @else
            -
        @endif
    </p>
</div>

            <div class="col-md-4">
                <label>Admin Email</label>
                <p class="form-control-plaintext">{{ $institution->admin_email ?? '-' }}</p>
            </div>

            <div class="col-md-4">
                <label>Admin Mobile</label>
                <p class="form-control-plaintext">{{ $institution->admin_mobile ?? '-' }}</p>
            </div>

        </div>
    </div>
</div>

{{-- ================= BILLING ================= --}}
<div class="col-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">4. Billing & Payment</h5>
        </div>
        <div class="card-body row g-3">

            <div class="col-md-3">
                <label>Invoice Type</label>
                <p>{{ $institution->invoice_type ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Invoice Frequency</label>
                <p>{{ $institution->invoice_frequency ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Payment Mode</label>
                <p>{{ $institution->payment_mode ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Payment Status</label>
                <p>{{ $institution->payment_status ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Invoice Amount</label>
                <p>{{ $institution->invoice_amount ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Payment Date</label>
                <p>{{ $institution->payment_date ?? '-' }}</p>
            </div>

            <div class="col-md-3">
                <label>Transaction Ref</label>
                <p>{{ $institution->transaction_reference ?? '-' }}</p>
            </div>

        </div>
    </div>
</div>

{{-- ================= SUPPORT ================= --}}
<div class="col-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">5. Support Details</h5>
        </div>
        <div class="card-body row g-3">

            <div class="col-md-4">
                <label>POC Name</label>
                <p>{{ $institution->poc_name ?? '-' }}</p>
            </div>

            <div class="col-md-4">
                <label>POC Email</label>
                <p>{{ $institution->poc_email ?? '-' }}</p>
            </div>

            <div class="col-md-4">
                <label>POC Contact</label>
                <p>{{ $institution->poc_contact ?? '-' }}</p>
            </div>

            <div class="col-md-4">
                <label>Support SLA</label>
                <p>{{ $institution->support_sla ?? '-' }}</p>
            </div>

        </div>
    </div>
</div>

</div>
</div>

@endsection