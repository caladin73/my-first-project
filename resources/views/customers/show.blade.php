@extends('layouts.app')

@section('title', 'Details for ' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Details for {{ $customer->name }} </h1>
            <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

            <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
            <div class="col-3">
                <p><strong>Name:</strong> {{ $customer->name }} </p>
                <p><strong>e-mail:</strong> {{ $customer->email }} </p>
                <p><strong>Company:</strong> {{ $customer->company->name }} </p>
                <p><strong>Status:</strong> {{ $customer->active }} </p>
            </div>
    </div>

@endsection