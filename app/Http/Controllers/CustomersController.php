<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() 
    {
        //$customers = Customer::all();
        //$customers = Customer::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $activeCustomers = Customer::active()->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $inactiveCustomers = Customer::inactive()->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $companies = Company::all();
        
        //dd($customers);
        //compackt metode, når man har de samme navne activeCustomers ect. 
        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));

        /*      //den lange metode
        return view('internals.customers', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers
        ]); 
        */
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);

        //dd($data);

        Customer::create($data);

        /* //alm metode men kræver mange gentagelser af ord/navne på felter
        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();
        */

        return back(); 

        //dd(request('name'));
    }
}