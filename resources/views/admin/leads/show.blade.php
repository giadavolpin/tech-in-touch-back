@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="m-3">I miei Messaggi</h1>


        @if (count($leads) == 0)
            <div>
                <h3 class="text-center mb-2">Non ci sono messaggi</h3>

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
                            <th scope="col">Cognome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Messaggio</th>
                            <th scope="col">Letto</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leads as $lead)
                            <tr>

                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->surname }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->message }}</td>
                                <td>
                                    {{ $lead->read ? 'Si' : 'No' }}
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
