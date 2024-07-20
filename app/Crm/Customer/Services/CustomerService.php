<?php

namespace Crm\Customer\Services;

use Crm\Customer\Events\CustomerCreation;
use Crm\customer\Models\Customer;
use Crm\customer\Requests\CreateCustomer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CustomerService
{
    public function index()
    {
        return Customer::all();
    }

    public function create(CreateCustomer $request)
    {
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->save();

        event(new CustomerCreation($customer));
        return $customer; 
    }

    public function show($id)
    {
        return Customer::find($id) ;
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if(!$customer) {
            return response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
        }
        $customer->name = $request->name;
        // Update other fields as needed
        $customer->save();

        return $customer;
    }

    public function delete(Request $request,int $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
        }
        // $customer->name = $request->get('name');
        $customer->delete();

        return response()->json(['status' => 'DELETEd'], Response::HTTP_OK);
    }
}
