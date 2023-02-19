@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="py-4 d-flex align-items-center gap-3 border-bottom">
            <span class="backoffice_title">Hai ricevuto una nuova recensione!</span>
        </h1>

        <p class="py-4 border-bottom">
            <span class="fs-5">Voto della recensione:</span>
            <span class="fs-5 backoffice_title">{{ $review->vote_id }}
            </span>
        </p>
        <span class="fs-5">Messaggio:</span>
        <p class="mt-4 lead_message border-bottom p-4">
            <span class="me-3"><i class="fa-solid fa-quote-left backoffice_title"></i></span>
            {{ $review->comment }}
            <span class="ms-3"><i class="fa-solid fa-quote-right backoffice_title"></i></span>
        </p>
        <div class="mt-5">
            <span class="me-2 fs-6">Recensione ricevuta il: </span>
            <span class="fs-6 backoffice_title">{{ $review->created_at }}</span>
        </div>

    </div>
@endsection
