@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <a href="/training/create" class="btn btn-primary">
                Create
            </a>
        </div>
        <div class="col-md-8">
            @foreach($training as $t)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $t->name }}
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
                        {{ $prereq->prerequisite->name}}
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