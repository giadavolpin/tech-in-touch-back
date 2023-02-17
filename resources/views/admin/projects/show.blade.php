@extends('layouts.admin')

@section('content')
    <div class="mt-3 px-5 ">
        <h1 class="backoffice_title py-3">{{ $project->name }}</h1>

        @if ($project->description)
            <p class="py-3 mb-5"> <span class="fw-bolder me-3">Descrizione del progetto :</span> {!! $project->description !!} </p>
        @endif


        @if ($project->cover_image)
            <div>
                <img width="450" src="{{ asset('storage/' . $project->cover_image) }}">
            </div>
        @else
            <img class="d-block" id="uploadPreview" width="300" src="https://via.placeholder.com/700x500">
        @endif

        <div class="text-end mt-4">
            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn dev_btn border-dark">Modifica
                Progetto</a>
        </div>
    </div>
@endsection
