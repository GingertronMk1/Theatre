@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{ $show->id ? route('shows.update', compact('show')) : route('shows.store') }}"
            method="POST">
            @if($show->id)
            @method('PUT')
            @endif
            @csrf
            <div class="card">
                <div class="card-header form-group">Create a new Show</div>
                <div class="card-body">
                    <label for="name">Show Title</label>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $show->name }}">
                    </div>

                    <label for="description">Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control">{{$show->description }}</textarea>
                    </div>

                    <label>Roles</label>
                    @include('components.shows.show-role')

                    <a href="#" id="add-show-role" class="btn btn-outline-primary">Add role</a>

                    <input type="submit" class="btn btn-primary" value="{{ $show->id ? 'Update' : 'Create' }}">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection
