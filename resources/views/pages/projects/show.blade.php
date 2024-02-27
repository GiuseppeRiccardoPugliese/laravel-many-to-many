@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Project: [{{ $project->id }}]</h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Titolo del progetto:
                        {{ $project->title }}</h5>
                    <p class="card-text">Descrizione del progetto: {{ $project->description }}</p>

                    <p class="card-text"><small class="text-muted">Nome del tipo:
                            {{ $project->type->name }}</small>
                    </p>
                    @foreach ($project->technologies as $technology)
                        <p class="card-text"><small class="text-muted">Nome della tecnologia:
                                {{ $technology->name }}</small>
                        </p>
                    @endforeach

                    {{-- Gestione per visualizzare la img --}}
                    <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded-start" alt="..."
                        width="250px">

                </div>
            </div>
        </div>
    </div>
@endsection
