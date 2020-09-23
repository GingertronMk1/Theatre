@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($trainingReceived) > 0)
            <h2>Training Received</h2>
            @foreach($trainingReceived as $t)
            <div class="card mb-3">
                <div class="card-header">{{ $t->training->name }}</div>
                <div class="card-body">Given by: {{ $t->trainer->name }}</div>
            </div>
            @endforeach
            @else
            <h2>No training received</h2>
            @endif

            @if(count($trainingGiven))
            <h2>Training Given</h2>
            @foreach($trainingGiven as $t)
            <div class="card mb-3">
                <div class="card-header">{{ $t->training->name }}</div>
                <div class="card-body">Given to: {{ $t->trainee->name }}</div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
