@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">Ecco i dettagli di: {{ $item->title }}</h1>

        <div class="card text-center">
            <div class="card-header d-flex justify-content-evenly">
                <span>{{ $item->lenguages }}</span>
                <a class="btn btn-warning" href="{{ route('admin.items.edit', ['item' => $item->id]) }}"><i
                        class="fa-solid fa-pencil"></i></a>
            </div>
            <div class="card-body">
                <h4 class="card-title">TITOLO: {{ $item->title }}</h4>
                <h6>TIPO: <span class="badge text-bg-success">{{ $item->type ? $item->type->name : 'NESSUN TIPO' }}</span>
                </h6>
                <p class="card-text">{{ $item->description }}</p>
                <a href="{{ $item->git_link }}" target="_blank" class="btn btn-primary">Vai a GitHub</a>
            </div>
            <div class="card-footer text-muted">
                {{ $item->date }}
            </div>
        </div>
    </div>
@endsection
