@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="py-4 d-flex align-items-center gap-3 border-bottom"> <span class="fs-5">Ricevuto da :</span>
            <span class="backoffice_title">{{ $lead->name }}
                {{ $lead->surname }}</span>
        </h1>

        <p class="py-4 border-bottom">
            <span class="fs-5">email del mittente :</span>
            <span class="fs-5 backoffice_title">{{ $lead->email }}
            </span>
        </p>
        <span class="fs-5">Messaggio:</span>
        <p class="mt-4 lead_message border-bottom p-4">
            <span class="me-3"><i class="fa-solid fa-quote-left backoffice_title"></i></span>
            {{ $lead->message }}
            <span class="ms-3"><i class="fa-solid fa-quote-right backoffice_title"></i></span>
        </p>
        <div class="mt-5">
            <span class="me-2 fs-6">Messaggio ricevuto il: </span>
            <span class="fs-6 backoffice_title">{{ $lead->created_at }}</span>
        </div>


        {{--         <div class="text-end mt-4">
            <a href="{{ route('admin.lead.edit', $lead->id) }}" class="btn btn-dark border-dark">Segna come letto</a>
        </div> --}}
    </div>
@endsection
