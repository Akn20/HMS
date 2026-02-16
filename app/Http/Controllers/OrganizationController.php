<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization; // Ensure you have the model

class OrganizationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Define Validation Rules
        $request->validate([
            'name' => 'required|string|min:3|max:100|regex:/^[A-Za-z\s]+$/',
            'type' => 'required|in:Private,Trust,Government',
            'registration_number' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\-\/]+$/',
            'gst' => 'required|string|size:10|alpha_num|unique:organizations,gst',
            'contact_number' => 'required|digits:10',
            'email' => 'required|email|max:255|unique:organizations,email',
            'admin_name' => 'required|string|min:3|max:100|regex:/^[A-Za-z\s]+$/',
            'admin_email' => 'required|email|unique:users,email',
            'admin_mobile' => 'required|digits:10',
            'plan_type' => 'required|in:Basic,Standard,Premium',
            'status' => 'required|boolean',
            'address' => 'required|string|min:10|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
        ], [
            // Custom Messages
            'gst.size' => 'The GST ID must be exactly 10 characters.',
            'name.regex' => 'The Organization name should only contain letters and spaces.',
        ]);

        // 2. Logic to save data...
        // Organization::create($request->all());

        return redirect()->back()->with('success', 'Organization saved successfully!');
    }
}
