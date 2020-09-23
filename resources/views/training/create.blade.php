@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form class="col-md-8" action="/training{{ $training->id ? '/' . $training->id : '' }}" method="POST">
            @if($training->id)
            @method('PUT')
            @endif
            @csrf
            <div class="card">
                <div class="card-header form-group">Create a new bit of Training</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Training name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $training->name }}">
                    </div>

                    <div class="form-group">

                        @php
                        $prerequisite_ids = [];
                        if(count($training->prerequisites) > 0) {
                            $prerequisite_ids = $training->prerequisites()->pluck('prerequisite_id')->all();
                        }
                        @endphp

                        <h3>Prerequisites</h3>
                        @foreach($other_training as $t)
                        @php
                            $is_prerequisite = in_array($t->id, $prerequisite_ids);
                        @endphp

                        <div class="form-check">
                            <input name="prerequisite[]" type="checkbox" class="form-check-input"
                                id="current-{{ $t->id }}" value="{{ $t->id }}" {{ $is_prerequisite ? "checked=\"checked\"" : ""}}>
                            <label for="current-{{ $t->id }}" class="form-check-label">
                            {{ $t->name }}
                            <span>{{ print_r($is_prerequisite, true) }}
                                </span>
                            </label>

                        </div>
                        @endforeach
                    </div>

                    <input type="submit" class="btn btn-primary" value="{{ $training->id ? 'Update' : 'Create' }}">
                    <a href="{{ route('training.index') }}" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection
