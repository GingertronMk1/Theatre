@extends('layouts.app')

@section('content')

<div class="container">
    <form class="col-md-8" action="/training/create" method="POST">
        @csrf
        <div class="card">
            <div class="card-header form-group">Create a new bit of Training</div>
            <div class="card-body">
                <label for="email">Training name</label>

                <input id="name" type="text" class="form-control" name="name">


                @foreach($other_training as $t)

                <div class="form-check">
                    <input name="prerequisite[]" type="checkbox" class="form-check-input" id="current-{{ $t->id }}" value="{{ $t->id }}">
                    <label for="current-{{ $t->id }}" class="form-check-label">
                        {{ $t->name }}
                    </label>

                </div>
                @endforeach


                <input type="submit" class="btn btn-primary">

            </div>
        </div>
    </form>
</div>

@endsection
