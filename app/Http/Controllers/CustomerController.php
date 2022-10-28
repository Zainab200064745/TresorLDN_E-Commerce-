<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Customer;
class CustomerController extends Controller
{
    public $customers = "";
    /**
     * This will create a customer
     *
     * @param Request This is responsible for requesting the customer's inputs
     * @return customer This will return the customer object
     */
    public function createCustomer(Request $request) {
        $customer = Customer::create($request->all());
        return $customer;
    }

    public function getDetails($id) {
        $candidate = Customer::Where('customer_id', $id)->get();
        return $candidate;
    }

    public function getAll() {
        $customers = Customer::all();
        return view('login', compact('customers'));
    }

}
