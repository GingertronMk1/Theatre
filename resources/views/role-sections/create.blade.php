@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{ $roleSection->id ? route('role-sections.update', compact('roleSection')) : route('role-sections.store') }}"
            method="POST">
            @if($roleSection->id)
            @method('PUT')
            @endif
            @csrf
            <div class="card">
                <div class="card-header form-group">Create a new Role Section</div>
                <div class="card-body">
                    <label for="name">Role Section name</label>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $roleSection->name }}">
                    </div>

                    <label for="description">Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">{{$roleSection->description }}</textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="{{ $roleSection->id ? 'Update' : 'Create' }}">
                    <a href="{{ route('training.index') }}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection
