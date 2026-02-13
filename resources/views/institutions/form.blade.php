<div class="main-content">
    <div class="row">

        {{-- ================= 1. CORE DETAILS ================= --}}
        <div class="col-12">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">1. Institution Details</h5>
                </div>

                <div class="card-body">
                    <div class="row g-3">



                        <div class="col-md-6">
                            <label class="form-label">Organization *</label>
                            <select name="organization_id" class="form-select" required>
                                <option value="">Select Organization</option>
                                @foreach($organizations as $org)
                                <option value="{{ $org->id }}"
                                    {{ old('organization_id', $institution->organization_id ?? '') == $org->id ? 'selected' : '' }}>
                                    {{ $org->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-md-6">
                            <label class="form-label">Institution Name *</label>
                            <input type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $institution->name ?? '') }}"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Institution Code *</label>
                            <input type="text"
                                class="form-control"
                                value="{{ old('code', $institution->code ?? $nextCode ?? '') }}"
                                readonly>
                            <input type="hidden"
                                name="code"
                                value="{{ old('code', $institution->code ?? $nextCode ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">GST Number</label>
                            <input type="text"
                                name="gst_number"
                                class="form-control"
                                value="{{ old('gst_number', $institution->gst_number ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $institution->email ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text"
                                name="contact_number"
                                class="form-control"
                                value="{{ old('contact_number', $institution->contact_number ?? '') }}">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea name="address"
                                class="form-control">{{ old('address', $institution->address ?? '') }}</textarea>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">City</label>
                            <input type="text"
                                name="city"
                                class="form-control"
                                value="{{ old('city', $institution->city ?? '') }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">State</label>
                            <input type="text"
                                name="state"
                                class="form-control"
                                value="{{ old('state', $institution->state ?? '') }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Country</label>
                            <input type="text"
                                name="country"
                                class="form-control"
                                value="{{ old('country', $institution->country ?? '') }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Pincode</label>
                            <input type="text"
                                name="pincode"
                                class="form-control"
                                value="{{ old('pincode', $institution->pincode ?? '') }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- ================= ACCESS & BRANDING ================= --}}
        <div class="col-12">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">2. Access & Branding</h5>
                </div>

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Institution URL</label>
                            <input type="text"
                                name="institution_url"
                                class="form-control"
                                value="{{ old('institution_url', $institution->institution_url ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Login Template</label>
                            <input type="text"
                                name="login_template"
                                class="form-control"
                                value="{{ old('login_template', $institution->login_template ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Default Language</label>
                            <input type="text"
                                name="default_language"
                                class="form-control"
                                value="{{ old('default_language', $institution->default_language ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Institution Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>

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

                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Admin Name</label>
                            <input type="text"
                                name="admin_name"
                                class="form-control"
                                value="{{ old('admin_name', $institution->admin_name ?? '') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Admin Email</label>
                            <input type="email"
                                name="admin_email"
                                class="form-control"
                                value="{{ old('admin_email', $institution->admin_email ?? '') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Admin Mobile</label>
                            <input type="text"
                                name="admin_mobile"
                                class="form-control"
                                value="{{ old('admin_mobile', $institution->admin_mobile ?? '') }}">
                        </div>

                       <div class="col-md-6">
    <label class="form-label">Modules</label>
    <p class="form-control-plaintext">
        {{ optional($institution)->modules
            ? optional($institution)->modules->pluck('module_display_name')->implode(', ')
            : '-' }}
    </p>
</div>




                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="Active"
                                    {{ old('status', $institution->status ?? '') == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="Inactive"
                                    {{ old('status', $institution->status ?? '') == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>