@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3 d-flex justify-content-between">
            <span>
                <a href="{{ route('training.create') }}" class="btn btn-primary mr-2">
                    Create
                </a>
                <a href="{{ route('training-session.create') }}" class="btn btn-outline-primary">
                    New Training Session
                </a>
            </span>
            <span>
                <button class="btn btn-primary" data-toggle="collapse" data-target=".multi-collapse"
                    aria-expanded="false">
                    Collapse/expand all
                </button>
            </span>
        </div>
        <div class="col-md-8">
            @foreach($trainings as $t)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse"
                    data-target="#collapse-{{ $t->id }}" aria-expanded="false" aria-controls="collapse-{{ $t->id }}">
                    <span>{{ $t->name }}</span>
                    <span>
                        <a href="{{ route('training.show', ['training' => $t]) }}"
                            class="btn btn-outline-primary">View</a>
                        <a href="{{ route('training.edit', ['training' => $t]) }}"
                            class="btn btn-outline-secondary">Edit</a>
                    </span>
                </div>

                <ul class="list-group list-group-flush collapse multi-collapse" id="collapse-{{ $t->id }}">
                    <h4 class="list-group-item text-bold">
                        Prerequisites
                    </h4>
                    @forelse($t->prerequisites as $prereq)
                    <li class="list-group-item">
                        {{ $prereq->prerequisite->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No prerequisites for this training
                    </li>
                    @endforelse
                    <h4 class="list-group-item">
                        Trained Users
                    </h4>
                    @forelse ($t->trainingUsers as $tu)
                    <li class="list-group-item">
                        {{ $tu->trainee->name }} trained by {{ $tu->trainer->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No users are trained in {{ $t->name }}
                    </li>
                    @endforelse
                    <h4 class="list-group-item">
                        Eligible Users
                    </h4>
                    @forelse ($t->eligible_users as $eu)
                    <li class="list-group-item">
                        {{ $eu->name }}
                    </li>
                    @empty
                    <li class="list-group-item">
                        No users are trained in {{ $t->name }}
                    </li>
                    @endforelse
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
