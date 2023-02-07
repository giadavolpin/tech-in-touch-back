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
                        <th scope="col">Nick</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Address</th>
                        <th scope="col">Bio</th>
                        <th scope="col">Phone</th>
                        <th scope="col">CV</th>
                        <th scope="col">Linkedin</th>
                        <th scope="col">Github</th>
                        <th scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professionists as $professionist)
                        <tr>
                            <th scope="row">{{ $professionist->id }}</th>
                            <td>{{ $professionist->nickname }}</td>
                            <td>{{ $professionist->name }}</td>
                            <td>{{ $professionist->surname }}</td>
                            <td>{{ $professionist->job_address }}</td>
                            <td>{{ Str::limit($professionist->bio, 20) }}</td>
                            <td>{{ $professionist->phone_number }}</td>
                            <td>{{ $professionist->cv_path }}</td>
                            <td>{{ $professionist->linkedin }}</td>
                            <td>{{ $professionist->github }}</td>

                            <td class="text-center"><a class="link-secondary" href=""
                                    title="Edit professionist"><i class="fa-solid fa-pen"></i></a></td>
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
