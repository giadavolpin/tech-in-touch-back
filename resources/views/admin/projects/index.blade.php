@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="my-5 text-center py-2 backoffice_title">I miei Progetti</h1>

        @if (!is_null($professionistID))
            <div class="text-center">
                <a class="btn dev_btn mx-3 mb-3" href="{{ route('admin.projects.create') }}">Nuovo Progetto</a>
            </div>
            @if (count($projects) == 0)
                <div>
                    <h3 class="text-center mb-2">Non sono ancora presenti progetti</h3>

                </div>
            @endif
        @else
            <div>
                <h3 class="text-center mb-2">Non hai ancora un profilo da Professionista, per aggiungere un progetto crea
                    prima il tuo profilo da professionista</h3>

            </div>
            <div class=" text-center">
                <a class="btn btn-dark" href="{{ route('admin.professionists.create') }}">Crea Profilo</a>
            </div>
        @endif



        @if (count($projects) > 0 && !is_null($professionistID))
            @if (session()->has('message'))
                <div class="alert alert-success mx-3 mb-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive mx-3">
                <table class="my-table table table-striped">
                    <thead class="blue_table_row">
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
                                <td><a class="text-decoration-none text-black"
                                        href="{{ route('admin.projects.show', $project->slug) }}" title="Vedi Progetto">
                                        {{ $project->name }} </a></td>
                                <td>{{ Str::limit($project->description, 30) }}</td>
                                @if ($project->cover_image)
                                    <td> <i class="fa-solid fa-circle-check text-success"></i></td>
                                @else
                                    <td><i class="fa-solid fa-circle-xmark text-danger"></i></td>
                                @endif


                                <td class="text-center"><a class="link-secondary"
                                        href="{{ route('admin.projects.edit', $project->slug) }}" title="Edit project"><i
                                            class="fa-solid fa-pen"></i></a></td>
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
