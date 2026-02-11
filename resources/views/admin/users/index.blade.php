@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h4>Users</h4>
        <a href="{{ route('users.create')
 }}" class="btn btn-primary">
            Create User
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Status</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->role->name ?? '-' }}</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                
                <td>
                {{ $user->updated_at ? $user->updated_at->format('Y-m-d') : '-' }}
                </td>

                <td>
                  <td>
    {{ $user->id }}
</td>

               <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                class="btn btn-sm btn-info">
                    Edit
                    </a>
                   <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                    method="POST" style="display:inline;">
                     @csrf
                    @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger">
                    Delete
                </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
