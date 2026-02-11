<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin') <!-- create a master layout -->

@section('title', 'Admin Dashboard')

@section('content')
<h1>Welcome to Admin Dashboard</h1>

<div class="cards">
    <div class="card">
        <h3>Total Users</h3>
        <p>{{ $totalUsers ?? 0 }}</p>
    </div>
    <div class="card">
        <h3>Total Roles</h3>
        <p>{{ $totalRoles ?? 0 }}</p>
    </div>
</div>

@endsection
