@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Projects: {{ count($projects) }}</h1>
    {{-- CREATE --}}
    <a href="{{ route('project.create') }}">
        CREATE
    </a>
    @foreach ($projects as $project)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">Titolo del progetto: <a {{-- SHOW --}}
                                href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a></h5>
                        <p class="card-text">Descrizione del progetto: {{ $project->description }}</p>

                        <p class="card-text"><small class="text-muted">Nome del tipo:
                                {{ $project->type->name }}</small>
                        </p>
                        @foreach ($project->technologies as $technology)
                            <p class="card-text"><small class="text-muted">Nome della tecnologia:
                                    {{ $technology->name }}</small>
                            </p>
                        @endforeach
                        {{-- EDIT --}}
                        <a href="{{ route('project.edit', $project->id) }}">EDIT</a>

                        {{-- DELTE --}}
                        <form action="{{ route('project.delete', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" id="destroy" name="destroy" value="DELETE">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
