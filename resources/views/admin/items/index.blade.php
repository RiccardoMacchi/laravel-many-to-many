@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Linguaggi</th>
                    <th scope="col">Link a GitHub</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->lenguages }}</td>
                        <td>{{ $item->git_link }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.items.show', ['item' => $item->id]) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                            {{-- Form delete incluso --}}
                            @include('admin.partials.formdelete', [
                                'route' => route('admin.items.destroy', ['item' => $item->id]),
                                'message' => "vuoi veramente eliminare $item->tilte",
                            ])

                            <a class="btn btn-warning" href="{{ route('admin.items.edit', ['item' => $item->id]) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
