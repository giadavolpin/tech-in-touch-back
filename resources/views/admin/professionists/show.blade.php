@extends('layouts.admin')

@section('content')



    <div class="mt-3 px-5">
        <h1>{{ $professionist->name }} {{ $professionist->surname }}</h1>
        <h2>{{ $professionist->nickname }}</h2>

        @if ($professionist->job_address)
            Address : {{ $professionist->job_address }}
        @endif

        @if ($professionist->phone_number)
            Phone : {{ $professionist->phone_number }}
        @endif

        @if ($professionist->bio)
            <p class="my-2">{!! $professionist->bio !!}</p>
        @endif

        @if ($professionist->profile_image)
            <div>
                <img width="300" src="{{ asset('storage/' . $professionist->profile_image) }}">
            </div>
        @endif

        @if ($professionist->cv_path)
            <div>
                <img width="300" src="{{ asset('storage/' . $professionist->cv_path) }}">
            </div>
        @endif

        @if ($professionist->technologies && count($professionist->technologies) > 0)
            <div class="d-flex">
                <span>Technologies:</span>
                <ul class="list-group-flush ">
                    @foreach ($professionist->technologies as $technology)
                        <li>{{ $technology->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($professionist->github)
            Github : {{ $professionist->github }}
        @endif

        @if ($professionist->linkedin)
            Linkedin : {{ $professionist->linkedin }}
        @endif

        <div class="text-end mt-4">
            <a href="{{ route('admin.professionists.edit', $professionist->id) }}"
                class="btn btn-light border-dark">Edit</a>
        </div>
    </div>

@endsection
