@extends('layouts.admin')

@section('content')
    {{-- <h1>{{ $professionist->name }}</h1>

    <h2>Plans</h2>
    <ul>
        @foreach ($professionist->plans as $plan)
            <li>{{ $plan->name }} {{ $plan->id }}</li>
        @endforeach
    </ul> --}}
    <div class="mt-3">
        <h1 class="text-center py-5 backoffice_title">Le mie transazioni</h1>
    </div>

    @if (count($professionist->plans) == 0)
        <h2 class="text-center">Non sono presenti pagamenti</h2>
    @else
        <div class="table-responsive mx-3">
            <table class="my-table table table-striped">
                <thead class="blue_table_row">
                    <tr>
                        <th scope="col">ID Transazione</th>
                        <th scope="col">Piano</th>
                        <th scope="col">Importo</th>
                        <th scope="col">Inzio abbonamento</th>
                        <th scope="col">Scadenza abbonamento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professionist->plans as $plan)
                        <tr>
                            <td>{{ $plan->pivot->id }}</td>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->price }} {{ $plan->price_sign }}</td>
                            <td>{{ $plan->pivot->subscription_start }}</td>
                            <td>{{ $plan->pivot->subscription_end }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
