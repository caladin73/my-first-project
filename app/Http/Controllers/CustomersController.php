<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //auth i contruller, kan låse det hele ned eller udvælge funktiob/sider der skal være eller ikke er adgang til except og only!
    public function __construct()
    {
        $this->middleware('auth'); //->except(['index']);
    }

    public function index() 
    {
        //$customers = Customer::all();
        //$customers = Customer::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        //$activeCustomers = Customer::active()->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        //$inactiveCustomers = Customer::inactive()->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        
        $customers = Customer::all(); //->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        //dd($customers);
        //compackt metode, når man har de samme navne activeCustomers ect. 
        return view('customers.index', compact('customers'));
    }
    
    public function create()
    {
        $companies = Company::all();

        //fikser probem med at customer ikke er sat når en ny skal tilgføjes i den samme form som bruges til show og edit
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

        /*      //den lange metode
        return view('internals.customers', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers
        ]); 
        */
    

    public function store()
    {
        $data = 

        //dd($data);

        Customer::create($this->validateRequest());

        /* //alm metode men kræver mange gentagelser af ord/navne på felter
        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();
        */

        return redirect('customers');

        //dd(request('name'));
    }

    public function show(Customer $customer)
    {
        //firOrFail tjekker om der finde en record hvis ikke retuner den 404 not found istedet for null
        //$customer = Customer::where('id', $customer)->firstOrFail();
        //overstående linje behøves ikke hvis man bruger route model binding, meget smart i Laravel!!!
        //der skal så addes 'Customer' til show($customer)

        //dd($customer);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {

        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'active' => 'required',
                'company_id' => 'required'
            ]);
    }

}
