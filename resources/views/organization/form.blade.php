<div class="row">

    <!-- LEFT CARD -->
    <div class="col-xl-6">
        <div class="card stretch stretch-full">
            <div class="card-body">

                <h5 class="mb-4">Organization Master</h5>

                <div class="mb-3">
                    <label class="form-label">Organization Name *</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $organization->name ?? '') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Organization Type</label>
                    <select name="type" class="form-control">
                        <option value="Private" {{ old('type', $organization->type ?? '') == 'Private' ? 'selected' : '' }}>Private</option>
                        <option value="Trust" {{ old('type', $organization->type ?? '') == 'Trust' ? 'selected' : '' }}>Trust</option>
                        <option value="Government" {{ old('type', $organization->type ?? '') == 'Government' ? 'selected' : '' }}>Government</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Registration Number</label>
                    <input type="text"
                           name="registration_number"
                           class="form-control"
                           value="{{ old('registration_number', $organization->registration_number ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GST / Tax ID</label>
                    <input type="text"
                           name="gst"
                           class="form-control"
                           value="{{ old('gst', $organization->gst ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text"
                           name="contact_number"
                           class="form-control"
                           value="{{ old('contact_number', $organization->contact_number ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $organization->email ?? '') }}">
                </div>

            </div>
        </div>
    </div>

    <!-- RIGHT CARD -->
    <div class="col-xl-6">
        <div class="card stretch stretch-full">
            <div class="card-body">

                <h5 class="mb-4">Admin & Subscription</h5>

                <div class="mb-3">
                    <label class="form-label">Admin Name</label>
                    <input type="text"
                           name="admin_name"
                           class="form-control"
                           value="{{ old('admin_name', $organization->admin_name ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Admin Email</label>
                    <input type="email"
                           name="admin_email"
                           class="form-control"
                           value="{{ old('admin_email', $organization->admin_email ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Admin Mobile</label>
                    <input type="text"
                           name="admin_mobile"
                           class="form-control"
                           value="{{ old('admin_mobile', $organization->admin_mobile ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subscription Plan</label>
                    <select name="plan_type" class="form-control">
                        <option value="Basic" {{ old('plan_type', $organization->plan_type ?? '') == 'Basic' ? 'selected' : '' }}>Basic</option>
                        <option value="Standard" {{ old('plan_type', $organization->plan_type ?? '') == 'Standard' ? 'selected' : '' }}>Standard</option>
                        <option value="Premium" {{ old('plan_type', $organization->plan_type ?? '') == 'Premium' ? 'selected' : '' }}>Premium</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Organization Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $organization->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $organization->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <!-- FULL WIDTH CARD -->
    <div class="col-12">
        <div class="card stretch stretch-full">
            <div class="card-body">

                <h5 class="mb-4">Address Details</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control">{{ old('address', $organization->address ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">City</label>
                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city', $organization->city ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">State</label>
                        <input type="text"
                               name="state"
                               class="form-control"
                               value="{{ old('state', $organization->state ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Country</label>
                        <input type="text"
                               name="country"
                               class="form-control"
                               value="{{ old('country', $organization->country ?? '') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Pincode</label>
                        <input type="text"
                               name="pincode"
                               class="form-control"
                               value="{{ old('pincode', $organization->pincode ?? '') }}">
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
