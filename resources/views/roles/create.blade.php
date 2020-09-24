@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{ $role->id ? route('roles.update', compact('role')) : route('roles.store') }}"
            method="POST">
            @if($role->id)
            @method('PUT')
            @endif
            @csrf
            <div class="card">
                <div class="card-header form-group">Create a new Role</div>
                <div class="card-body">
                    <label for="name">Role name</label>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}">
                    </div>

                    <label for="description">Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">{{$role->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="role-section-id">
                            Role Section
                        </label>
                        <select name="role_section_id" id="role-section-id" class="form-control">
                            @foreach($role_sections as $role_section)
                            <option value="{{ $role_section->id }}"{{ $role->role_section_id === $role_section->id ? ' selected' : '' }}>
                                {{ $role_section->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <input type="submit" class="btn btn-primary" value="{{ $role->id ? 'Update' : 'Create' }}">
                    <a href="{{ route('training.index') }}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection
