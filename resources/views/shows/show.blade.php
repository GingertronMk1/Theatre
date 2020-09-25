@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header d-flex justify-content-between">
                    <span>
                        {{ $show->name }}
                    </span>
                    <a href="{{ route('shows.edit', compact('show')) }}" class="btn btn-outline-primary">Edit show</a>
                </h2>
                <div class="card-body">
                    <h4>Description</h4>
                    <p>@nl_br($show->description)</p>
                <h4>Showings</h4>
                <ul>
                    @foreach($show->instances as $instance)
                    <li>{{ $instance->start_time->format('D d/m/Y \a\t h:iA') }}</li>
                    @endforeach
                </ul>

                <h4>Cast</h4>
                <ul>
                    @forelse($show->cast as $role)
                    <li> {{ $role->role->name }}: {{ $role->user->name }}</li>
                    @empty
                    <li>This show has no cast</li>
                    @endforelse
                </ul>

                <h4>Crew</h4>
                <ul>
                    @forelse($show->crew as $role)
                    <li> {{ $role->role->name }}: {{ $role->user->name }}</li>
                    @empty
                    <li>This sho has no crew</li>
                    @endforelse
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
