@extends('layouts.admin')

@section('content')
    <div class="mt-3 px-5">
        <h1>{{ $lead->name }} {{ $lead->surname }} </h1>

        <p class="my-2"> Messaggio ricevuto da : {{ $lead->email }} </p>
        <p class="my-2"> Messaggio : {{ $lead->message }} </p>


        {{--         <div class="text-end mt-4">
            <a href="{{ route('admin.lead.edit', $lead->id) }}" class="btn btn-dark border-dark">Segna come letto</a>
        </div> --}}
    </div>
@endsection
