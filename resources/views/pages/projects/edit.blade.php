@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Edit Project</h1>

    {{-- VALIDATION REQUEST --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $project->title }}">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $project->description }}">

        <label for="type_id">Select a type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @if ($project->type->id == $type->id) selected @endif>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/png">
        <br>
        <br>
        <label>
            <b>Technologies:</b>
        </label>
        <br>
        @foreach ($technologies as $technology)
            <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $technology->id }}"
                value="{{ $technology->id }}"
                @foreach ($project->technologies as $project_technology)
                    @if ($project_technology->id == $technology->id)
                        checked
                    @endif @endforeach>
            <label for="{{ 'technology_id_' . $technology->id }}">
                {{ $technology->name }}
            </label>
            <br>
        @endforeach
        <br>
        <input type="submit" value="EDIT">
    </form>
@endsection
