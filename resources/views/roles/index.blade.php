@extends('layouts.app')

@section('header', 'Roles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                Create Role
            </a>
            <a href="{{ route('role-sections.create') }}" class="btn btn-outline-primary">
                Create Role Section
            </a>
        </div>
        <div class="col-md-8">
            @foreach($role_sections as $role_section)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $role_section->name }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($role_section->roles as $role)
                    <li class="list-group-item">
                        <p>{{ $role->name }}</p>
                        <p>@nl_br($role->description)</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
