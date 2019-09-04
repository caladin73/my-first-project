@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customers" method="POST" class="pb-2">
        <p>Name:</p>
        <div class="input-group pb-1">
        <input type="text" name="name" value="{{ old('name') }}">
            {{ $errors->first('name') }}
        </div>

        <p>e-mail:</p>
        <div class="input-group pb-1">
            <input type="text" name="email" value="{{ old('email') }}">
            {{ $errors->first('email') }}
        </div>

        <br>

        <button type="submit">Add Customer</button>
        @csrf
    </form>

    <table width="400" border="1">
        <td><b>Name</b></td>
        <td><b>e-mail</b></td>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
        </tr>
        @endforeach 
    </table>

@endsection