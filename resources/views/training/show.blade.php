@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $training->name }}</div>
                <ul class="list-group list-group-flush">
                    @if(count($training->prerequisites) > 0)
                    <li class="list-group-item">
                        Prerequisites
                        <ul>
                            @foreach($training->prerequisites as $prerequisite)
                            <li>
                                {{ $prerequisite->prerequisite->name }}
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @if(count($training->trainingUsers) > 0)
                    <li class="list-group-item">
                        Trained Users
                        <ul>
                            @foreach($training->trainingUsers as $tu)
                            <li>
                                {{ $tu->trainee->name }} ({{ $tu->trainer->name }})
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
