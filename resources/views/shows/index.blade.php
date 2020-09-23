@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <a href="{{ route('shows.create') }}" class="btn btn-primary">
                Create
            </a>
        </div>
        <div class="col-md-8">
            @foreach($shows as $s)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ $s->name }}</span>
                    <span>
                        <a href="{{ route('shows.show', ['show' => $s]) }}" class="btn btn-outline-primary">View</a>
                        <a href="{{ route('shows.edit', ['show' => $s]) }}"
                            class="btn btn-outline-secondary">Edit</a>
                    </span>
                </div>
                <div class="card-body">
                    @nl_br($s->description)
                </br></br>
                @php
                $instances = $s->instances->sortBy('start_time');
                $earliest = $instances->first()->start_time->format('d/m/Y');
                $latest = $instances->last()->start_time->format('d/m/Y');

                @endphp
                    Showing from {{ $earliest }} to {{ $latest }}
                </div>

            </div>
            @endforeach
        </div>
    </div>
    @endsection
