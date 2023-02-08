@extends('layouts.admin')

@section('content')
    <div class="mt-3 px-5">
        <h1>{{ $project->name }}</h1>

        @if ($project->description)
            <p class="my-2"> Descrizione del progetto : {!! $project->description !!} </p>
        @endif


        @if ($project->cover_image)
            <div>
                <img width="300" src="{{ asset('storage/' . $project->cover_image) }}">
            </div>
        @endif

        <div class="text-end mt-4">
            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-light border-dark">Modifica
                Progetto</a>
        </div>
    </div>
@endsection
