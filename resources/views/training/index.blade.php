@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <a href="{{ route('training.create') }}" class="btn btn-primary">
                Create
            </a>
        </div>
        <div class="col-md-8">
            @foreach($training as $t)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ $t->name }}</span>
                    <span>
                        <a href="{{ route('training.show', ['training' => $t]) }}" class="btn btn-outline-primary">View</a>
                        <a href="{{ route('training.edit', ['training' => $t]) }}" class="btn btn-outline-secondary">Edit</a>
                    </span>
                </div>

                @if(count($t->prerequisites) > 0)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-bold">
                        <h3>
                            Prerequisites
                        </h3>
                    </li>
                    @foreach($t->prerequisites as $prereq)
                    <li class="list-group-item">
                        {{ $prereq->prerequisite->name }}
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="card-body">No prerequisites for this training</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
