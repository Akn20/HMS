<form action="{{ route('organization.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">

        <div class="col-xl-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <h5 class="mb-4">Organization Master</h5>

                    <div class="mb-3">
                        <label class="form-label">Organization Name *</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required
                            pattern="^[A-Za-z\s]{3,100}$">
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Name required (letters only, min 3 chars). @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Organization Type *</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                            <option value="">Select Type</option>
                            @foreach(['Private', 'Trust', 'Government'] as $t)
                            <option value="{{ $t }}" {{ old('type') == $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('type') {{ $message }} @else Please select a type. @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Registration Number *</label>
                        <input type="text" name="registration_number"
                            class="form-control @error('registration_number') is-invalid @enderror"
                            value="{{ old('registration_number') }}" required pattern="^[A-Za-z0-9\-\/]{3,50}$">
                        <div class="invalid-feedback">@error('registration_number') {{ $message }} @else Valid registration number required. @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">GST / Tax ID *</label>
                        <input type="text" name="gst"
                            class="form-control @error('gst') is-invalid @enderror"
                            value="{{ old('gst') }}" placeholder="ABCDE1234F"
                            pattern="^[A-Z0-9]{10}$" maxlength="10" required
                            oninput="this.value = this.value.toUpperCase()">
                        <div class="invalid-feedback">@error('gst') {{ $message }} @else Exactly 10 alphanumeric characters. @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number *</label>
                        <input type="tel" name="contact_number"
                            class="form-control @error('contact_number') is-invalid @enderror"
                            value="{{ old('contact_number') }}" required pattern="^[0-9]{10}$"
                            placeholder="Eg: 9876543210">
                        <div class="invalid-feedback">@error('contact_number') {{ $message }} @else Enter 10-digit mobile number. @enderror</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                        <div class="invalid-feedback">@error('email') {{ $message }} @else Valid email address required. @enderror</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <h5 class="mb-4">Admin & Subscription</h5>

                    <div class="mb-3">
                        <label class="form-label">Admin Name *</label>
                        <input type="text" name="admin_name"
                            class="form-control @error('admin_name') is-invalid @enderror"
                            value="{{ old('admin_name') }}" required pattern="^[A-Za-z\s]{3,100}$">
                        <div class="invalid-feedback">Admin name required (letters only).</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Email *</label>
                        <input type="email" name="admin_email"
                            class="form-control @error('admin_email') is-invalid @enderror"
                            value="{{ old('admin_email') }}" required>
                        <div class="invalid-feedback">Valid admin email is required.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Mobile *</label>
                        <input type="tel" name="admin_mobile"
                            class="form-control @error('admin_mobile') is-invalid @enderror"
                            value="{{ old('admin_mobile') }}" required pattern="^[0-9]{10}$">
                        <div class="invalid-feedback">Enter 10-digit mobile number.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subscription Plan *</label>
                        <select name="plan_type" class="form-control @error('plan_type') is-invalid @enderror" required>
                            <option value="">Select Plan</option>
                            <option value="Basic" {{ old('plan_type') == 'Basic' ? 'selected' : '' }}>Basic</option>
                            <option value="Standard" {{ old('plan_type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="Premium" {{ old('plan_type') == 'Premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                        <div class="invalid-feedback">Select a plan.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Organization Status *</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <div class="invalid-feedback">Select status.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <h5 class="mb-4">Address Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address *</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                required minlength="10" rows="3">{{ old('address') }}</textarea>
                            <div class="invalid-feedback">Min 10 characters required.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">City *</label>
                            <input type="text" name="city" value="{{ old('city') }}"
                                class="form-control @error('city') is-invalid @enderror" required>
                            <div class="invalid-feedback">City is required.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">State *</label>
                            <input type="text" name="state" value="{{ old('state') }}"
                                class="form-control @error('state') is-invalid @enderror" required>
                            <div class="invalid-feedback">State is required.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Country *</label>
                            <input type="text" name="country" value="{{ old('country') }}"
                                class="form-control @error('country') is-invalid @enderror" required>
                            <div class="invalid-feedback">Country is required.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pincode *</label>
                            <input type="text" name="pincode" value="{{ old('pincode') }}"
                                class="form-control @error('pincode') is-invalid @enderror"
                                required pattern="^[0-9]{6}$" maxlength="6">
                            <div class="invalid-feedback">Enter 6-digit pincode.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3 mb-5">
            <button type="submit" class="btn btn-primary btn-lg">Save Organization</button>
        </div>

    </div>
</form>