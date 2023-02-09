@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="m-3">Progetti</h1>
        <div class="text-end">
            <a class="btn btn-dark mx-3 mb-3" href="{{ route('admin.projects.create') }}">Nuovo Progetto</a>
        </div>

            @if (count($projects) == 0)
                <div>
                    <h3 class="text-center mb-2">Non sono ancora presenti progetti</h3>

                </div>
            @else
                @if (session()->has('message'))
                    <div class="alert alert-success mx-3 mb-3">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="table-responsive mx-3">
                    <table class="my-table table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Immagine</th>
                                <th scope="col">Modifica</th>
                                <th class="text-center" scope="col">Elimina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td><a href="{{ route('admin.projects.show', $project->slug) }}" title="Vedi Progetto">
                                            {{ $project->name }} </a></td>
                                    <td>{{ Str::limit($project->description, 30) }}</td>
                                    <td>{{ $project->cover_image }}</td>

                                    <td class="text-center"><a class="link-secondary"
                                            href="{{ route('admin.projects.edit', $project->slug) }}"
                                            title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button btn btn-danger "
                                                data-item-title="{{ $project->slug }}"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif



    </div>

    {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}

    @include('partials.admin.modal-delete')
@endsection
