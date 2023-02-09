@extends('layouts.admin')

@section('content')



    <div class="mt-3 px-5">
        <h1 class="mb-5">{{ $professionist->name }} {{ $professionist->surname }}</h1>
        <div class="row">
            <div class="col-lg-6 border-end">
                @if ($professionist->profile_image)
                    <div class="py-4">
                        <img width="300" src="{{ asset('storage/' . $professionist->profile_image) }}">
                    </div>
                @else
                <img class="d-block mb-2" id="uploadPreview" width="100"
                src="https://via.placeholder.com/300x200">
                @endif
                @if ($professionist->nickname)
                    <h2 class="mb-4"><span class="fs-2 me-3">Nickname:</span>{{ $professionist->nickname }}</h2>
                @endif
                @if ($professionist->job_address)
                    <h3>
                        <p>Indirizzo : {{ $professionist->job_address }}</p>
                    </h3>
                @endif

                @if ($professionist->phone_number)
                    <h3>
                        <p>Telefono : {{ $professionist->phone_number }}</p>
                    </h3>
                @endif
                @if ($professionist->technologies && count($professionist->technologies) > 0)
                    <div class="d-flex">
                        <span>I miei linguaggi:</span>
                        <ul class="list-unstyled d-flex gap-2 ms-3">
                            @foreach ($professionist->technologies as $technology)
                                <li>{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-6 ps-5">
                @if ($professionist->cv_path)
                    <div class="mb-5">
                        <img width="200" src="{{ asset('storage/' . $professionist->cv_path) }}">
                    </div>
                    @else
                    <img class="d-block mb-2" id="uploadPreview" width="200"
                    src="https://via.placeholder.com/300x390">
                @endif
                @if ($professionist->github)
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="fs-3"><i class="fa-brands fa-github"></i></span>
                        <a href="{{ $professionist->github }}" target="_blank">{{ $professionist->github }}</a>
                    </div>
                @endif

                @if ($professionist->linkedin)
                    <div class="d-flex align-items-center gap-3">
                        <span class="fs-3"><i class="fa-brands fa-linkedin"></i></span>
                        <a href="{{ $professionist->linkedin }}" target="_blank">{{ $professionist->linkedin }}</a>
                    </div>
                @endif
            </div>
        </div>

        @if ($professionist->bio)
            <div class="mt-5">
                <span class="text-center d-block">Descrizione</span>
                <p class="fs-4 ">{!! $professionist->bio !!}</p>
            </div>
        @endif

        <div class="text-end mt-5">
            <a href="{{ route('admin.professionists.edit', $professionist->slug) }}"
                class="btn btn-light border-dark">Modifica Profilo</a>
        </div>
    </div>

@endsection
