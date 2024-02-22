@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Projects</h1>
    @foreach ($projects as $project)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">Titolo del progetto: {{ $project->title }}</h5>
                        <p class="card-text">Descrizione del progetto: {{ $project->description }}</p>

                        <p class="card-text"><small class="text-muted">Nome del tipo:
                                {{ $project->type->name }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
