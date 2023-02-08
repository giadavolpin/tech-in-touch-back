@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="m-3">I miei Profili</h1>
        <div class="text-end">

                <a class="btn btn-dark mx-3 mb-3" href="{{ route('admin.professionists.create')}}">Aggiungi Profilo</a>


        </div>
        @if (session()->has('message'))
            <div class="alert alert-success mx-3 mb-3">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="table-responsive mx-3">
            <table  class="my-table table table-striped">
                <thead class="table-dark">
                    <tr>

                        <th scope="col">Nick</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Bio</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">CV</th>
                        <th scope="col">Linkedin</th>
                        <th scope="col">Github</th>
                        <th scope="col">Modifica</th>
                        <th class="text-center" scope="col">Elimina</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professionists as $professionist)
                        <tr>

                            <td>{{ $professionist->nickname }}</td>
                            <td>{{ $professionist->name }}</td>
                            <td>{{ $professionist->surname }}</td>
                            <td>{{ $professionist->job_address }}</td>
                            <td>{{ Str::limit($professionist->bio, 20) }}</td>
                            <td>{{ $professionist->phone_number }}</td>
                            <td>{{ Str::limit($professionist->cv_path, 20) }}</td>
                            <td>{{ $professionist->linkedin }}</td>
                            <td>{{ $professionist->github }}</td>

                            <td class="text-center"><a class="link-secondary" href=""
                                    title="Edit professionist"><i class="fa-solid fa-pen"></i></a></td>
                            <td class="text-center">
                                <form action="{{route('admin.professionists.destroy', $professionist->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger "
                                        data-item-title="{{$professionist->slug}}"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}

    @include('partials.admin.modal-delete')
@endsection
