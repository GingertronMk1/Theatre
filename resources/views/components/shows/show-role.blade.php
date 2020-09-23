<div class="form-group form-inline">
    <select class="form-control" name="roles[][role_id]">
        @foreach(App\Models\Role::all() as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <select class="form-control" name="roles[][user_id]">
        @foreach(App\Models\User::all() as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
