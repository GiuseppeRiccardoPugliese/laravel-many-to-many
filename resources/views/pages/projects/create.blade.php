@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>New Project</h1>

    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="type_id">Select a type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <br>
        <label>
            <b>Types:</b>
        </label>
        <br>
        @foreach ($technologies as $technology)
            <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $technology->id }}"
                value="{{ $technology->id }}">
            <label for="{{ 'technology_id_' . $technology->id }}">
                {{ $technology->name }}
            </label>
            <br>
        @endforeach
        <br>
        <input type="submit" value="CREATE">
    </form>
@endsection
