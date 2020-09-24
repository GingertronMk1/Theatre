@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    New training session
                </div>
                <form class="card-body" action="{{ route('training-session.save') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="trainer-select">Trainer</label>
                        <select name="trainer" id="trainer-select" class="form-control">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Trainings</label>
                        <div class="form-group">

                            @foreach($trainings as $training)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="training-{{ $training->id }}"
                                    name="trainings[]" value="{{ $training->id }}">
                                <label class="form-check-label"
                                    for="training-{{ $training->id }}">{{ $training->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Trainees</label>
                        <div class="form-group">

                            @foreach($users as $user)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="user-{{ $user->id }}"
                                    name="trainees[]" value="{{ $user->id }}">
                                <label class="form-check-label" for="user-{{ $user->id }}">{{ $user->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save Session">
                        <a href="{{ url()->previous() }}"
                            class="btn btn-danger">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
