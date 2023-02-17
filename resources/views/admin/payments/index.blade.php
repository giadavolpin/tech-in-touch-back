@extends('layouts.admin')

@section('content')
    <h1>{{ $professionist->name }}</h1>

    <h2>Plans</h2>
    <ul>
        @foreach ($professionist->plans as $plan)
            <li>{{ $plan->name }}</li>
        @endforeach
    </ul>
@endsection
