@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <h1>Modifica del Progetto: {{ $item->title }}</h1> --}}
        <h1>{{ $title }}</h1>
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small>{{ $error }}</small>
            @endforeach
        @endif --}}
        <form action="{{ route('admin.items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titolo:</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Inserisci il titolo del progetto" value="{{ old('title', $item->title) }}">
                @error('title')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="type_id">TIPO:</label>
                <select class="form-select" name="type_id" id="types">
                    <option value="">Scegli un'opzione</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{-- Condizione per lasciare selzionato --}}
                            @if (old('type_id', $item->type_id) == $type->id) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="lenguages">Linguaggi Usati:</label>
                <input type="text" class="form-control" id="lenguages" name="lenguages"
                    placeholder="Inserisci i linguaggi usati" value="{{ old('lenguages', $item->lenguages) }}">
                @error('lenguages')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="git_link">Link a GitHub:</label>
                <input type="text" class="form-control" id="git_link" name="git_link"
                    placeholder="Inserisci il link a GitHub" value="{{ old('git_link', $item->git_link) }}">
                @error('git_link')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description"> {{ old('description', $item->description) }}</textarea>
                @error('description')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="date">Data:</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Inserisci la data"
                    value="{{ old('date', $item->date) }}">
                @error('date')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
