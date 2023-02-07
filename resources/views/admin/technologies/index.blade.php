@extends('layouts.admin')

@section('content')
    <h1 class="m-3">Technologies</h1>
    {{-- <form class=" action="{{route('admin.technologies.store')}}" method="post" class="d-flex align-items-center m-4">
        @csrf
        <div class="input-group m-3 w-50">
            <input type="text" name="name" class="form-control" placeholder="
            Add a tag name here " aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
        </div>
    </form> --}}
    @if(session()->has('message'))
    <div class="alert alert-success m-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="mx-3">
    <table class="my-table table table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Icon</th>

            <th class="text-center" scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($technologies as $technology)
                <tr>
                    <th scope="row">{{$technology->id}}</th>

                    <td>
                        {{$technology->name}}
                    </td>
                    <td>
                        {{$technology->icon}}
                    </td>

                    {{-- <td>
                        <form id="technology-{{$technology->id}}" action="{{route('admin.technologies.update', $technology->slug)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="name" value="{{$technology->name}}">
                        </form>

                    </td> --}}

                    {{-- <td class="text-center">
                        {{ $technology->projects && count($technology->projects) > 0 ? count($technology->projects) : 0 }}
                    </td> --}}

                    <td class="my-w-100 text-center">
                        <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger " data-item-title="{{$technology->name}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    @include('partials.admin.modal-delete')
@endsection

