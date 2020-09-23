@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="{{ $show->id ? route('shows.update', compact('show')) : route('shows.store') }}" method="POST">
            @if($show->id)
            @method('PUT')
            @endif
            @csrf
            <div class="card">
                <div class="card-header form-group">Create a new Show</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Show Title</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $show->name }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            cols="30"
                            rows="10"
                            class="form-control">{{$show->description }}</textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="{{ $show->id ? 'Update' : 'Create' }}">
                    <a href="{{ route('training.index') }}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection
