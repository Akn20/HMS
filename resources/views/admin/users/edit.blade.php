<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf

    @method('PUT')

    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" required>
    <input type="text" name="mobile" value="{{ $user->mobile }}" required>
    <select name="role">
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
    </select>
    <select name="status">
        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
    <button type="submit">Update</button>
</form>
