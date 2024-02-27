@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>New Project</h1>

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

    {{-- enctype="multipart/form-data" In Laravel, quando si lavora con l'upload di file, è necessario assicurarsi che il tuo form abbia l'attributo enctype impostato su multipart/form-data. Questo consente al browser di codificare correttamente il contenuto del file per l'invio.  --}}
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
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
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <br>
        <br>
        <label>
            <b>Technologies:</b>
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
