@extends('layout')

@section('title')
    Customer List
@endsection
    
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
            <p><a href="customers/create">Add new Customer</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-2">Id</div>
        <div class="col-4">Customer</div>
        <div class="col-4">Company</div>
        <div class="col-2">Status</div>
    </div>
    <hr>
    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">
                <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach
@endsection