@php
$user_id = $user_id ?? null;
$role_id = $role_id ?? null;
@endphp


<div class="form-group form-inline new-role">
    <select class="form-control mr-3" name="roles[role_id][]">
        @foreach(App\Models\Role::all() as $role)
        <option value="{{ $role->id }}" {{ $role->id === $role_id ? 'selected' : '' }}>
            {{ $role->name }}
        </option>
        @endforeach
    </select>

    <select class="form-control" name="roles[user_id][]">
        @foreach(App\Models\User::all() as $user)
        <option value="{{ $user->id }}" {{ $user->id === $user_id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
        @endforeach
    </select>
</div>
