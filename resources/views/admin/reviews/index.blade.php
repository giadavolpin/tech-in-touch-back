@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="my-5 text-center backoffice_title">Le mie recensioni</h1>


        @if (count($reviews) == 0)
            <div>
                <h3 class="text-center mb-2">Non ci sono recensioni</h3>

            </div>
        @else
            @if (session()->has('message'))
                <div class="alert alert-success mx-3 mb-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive mx-3">
                <table class="my-table table table-striped">
                    <thead class="blue_table_row">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Voto</th>
                            <th scope="col">Commento</th>
                            <th scope="col">Data ricezione</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td class="text-center">
                                    <a class="btn dev_btn" href="{{ route('admin.reviews.show', $review->id) }}"
                                        title="Vedi messaggio">
                                        Leggi
                                    </a>
                                </td>
                                <td>
                                    {{ $review->vote_id }}</td>
                                <td>{{ Str::limit($review->comment, 35) }}</td>
                                <td>{{ $review->created_at }}</td>

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
