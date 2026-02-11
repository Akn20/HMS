@extends('layouts.app')

@section('content')

<div class="container">
    <h4>Create User</h4>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-control" required>
                <option value="">-- Select Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>MPIN</label>
            <input type="password" name="mpin" class="form-control" required>
        </div>

        <button class="btn btn-success">Create User</button>
    </form>
</div>

@endsection
