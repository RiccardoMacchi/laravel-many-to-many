@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>TITOLO</h1>
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small>{{ $error }}</small>
            @endforeach
        @endif --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <ul class="list-group list-group-flush my_list">
            @foreach ($techs as $tech)
                <li class="d-flex justify-content-between list-group-item">
                    <form id="update-{{ $tech->id }}" action="{{ route('admin.techs.update', $tech) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input class="input-edit" type="text" name="name" value="{{ $tech->name }}">
                    </form>
                    <div>
                        <button type="submit" class="btn btn-warning" onclick="submitUpdate({{ $tech->id }})"><i
                                class="fa-solid fa-pencil"></i></button>
                        @include('admin.partials.formdelete', [
                            'route' => route('admin.techs.destroy', $tech),
                            'title' => "vuoi veramente eliminare $tech->name",
                        ])
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="my-5">
            @error('name')
                <small>{{ $message }}</small>
            @enderror
            <form action="{{ route('admin.techs.store') }}" method="POST">
                @csrf
                <label for="name">INSERISCI UN NUOVO TIPO:</label>
                <input type="text" name="name" placeholder="Inserisci un nuovo tipo">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    {{-- Funzione per associazione btn modifica con form tramite id --}}
    <script>
        function submitUpdate(id) {
            let form = document.getElementById(`update-${id}`)
            // Effettuiamo il submit sul bottone
            form.submit();
        }
    </script>
@endsection
