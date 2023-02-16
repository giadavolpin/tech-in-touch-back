@extends('layouts.admin')

@section('content')
    <div>



        @if (count($professionists) == 0)
            <div class="mt-3">
                <h1 class="text-center mb-3 backoffice_title">Benvenuto</h1>
                <h3 class="text-center mb-4">Registra il tuo primo profilo</h3>
            </div>
        @else
            <h1 class="text-center m-3 py-3 backoffice_title">Il mio Profilo</h1>


            @if (session()->has('message'))
                <div class="alert alert-success mx-3 mb-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive mx-3">
                <table class="my-table table table-striped">
                    <thead class="blue_table_row">
                        <tr>

                            <th scope="col">Nick</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Indirizzo</th>
                            <th class="text-center" scope="col">Tecnologie</th>
                            <th class="text-center" scope="col">Creato il</th>
                            <th class="text-center" scope="col">Visibile</th>
                            <th scope="col" class="text-center">Modifica</th>
                            <th class="text-center" scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professionists as $professionist)
                            <tr>

                                <td><a class="backoffice_title text-decoration-none"
                                        href="{{ route('admin.professionists.show', $professionist->slug) }}">{{ $professionist->nickname }}</a>
                                </td>
                                <td>
                                    <a class="text-black text-decoration-none"
                                        href="{{ route('admin.professionists.show', $professionist->slug) }}">{{ $professionist->name }}</a>
                                </td>
                                <td><a class="text-black text-decoration-none"
                                        href="{{ route('admin.professionists.show', $professionist->slug) }}">{{ $professionist->surname }}</a>
                                </td>
                                <td>{{ $professionist->job_address }}</td>
                                <td class="text-center">
                                    {{ $professionist->technologies && count($professionist->technologies) > 0 ? count($professionist->technologies) : 0 }}
                                </td>
                                <td class="text-center">{{ $professionist->created_at }}</td>
                                <td class="text-center">
                                    <i
                                        class="fa-solid fa-circle {{ $professionist->visible == 1 ? 'prof-visible' : 'prof-invisible' }}"></i>
                                </td>


                                <td class="text-center"><a class="link-secondary"
                                        href="{{ route('admin.professionists.edit', ['professionist' => $professionist->slug]) }}"
                                        title="Edit professionist"><i class="fa-solid fa-pen"></i></a></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.professionists.destroy', $professionist->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button btn btn-danger "
                                            data-item-title="{{ $professionist->slug }}"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (!count($professionists) >= 1)
            <div class="text-center">
                <a class="btn dev_btn mx-3 mb-3" href="{{ route('admin.professionists.create') }}">Aggiungi Profilo</a>
            </div>
        @endif
    </div>

    {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}

    @include('partials.admin.modal-delete')
@endsection
