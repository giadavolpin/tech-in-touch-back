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
                            <th scope="col">Voto</th>
                            <th scope="col">Commento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>
                                    {{ $review->vote_id }}</td>
                                <td>{{ $review->comment }}</td>
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
