@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="m-3">Professionist</h1>
        <div class="text-end">
            <a class="btn btn-dark mx-3 mb-3" href="">New Professionist</a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success mx-3 mb-3">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="table-responsive mx-3">
            <table  class="my-table table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cover_img</th>
                        <th scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ Str::limit($project->description, 20) }}</td>
                            <td>{{ $project->cover_img }}</td>

                            <td class="text-center"><a class="link-secondary" href=""
                                    title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                            <td class="text-center">
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger "
                                        data-item-title=""><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}

    @include('partials.admin.modal-delete')
@endsection
