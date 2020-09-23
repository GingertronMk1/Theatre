@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $show->name }}</div>
                <div class="card-body">
                    @nl_br($show->description)
                </br>
                </br>
                Showings at:
                <ul>
                    @foreach($show->instances as $instance)
                    <li>{{ (new DateTime($instance->start_time))->format('D d/m/Y \a\t h:iA') }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
