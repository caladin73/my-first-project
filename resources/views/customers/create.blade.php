@extends('layouts.app')

@section('title')
    New Customer
@endsection
    
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>New Customer</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
                <form action="/customers" method="POST">
                    @include('customers.form')

                    <button type="submit" class="btn btn-primary">Add Customer</button>
                    
                </form>            
        </div>
    </div>

@endsection