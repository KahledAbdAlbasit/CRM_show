<?php

namespace App\Http\Controllers;

use Crm\Castomer\Models\Customer;
use Crm\customer\Requests\CreateCustomer;
use Crm\customer\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        return $this->customerService->index($request);
    }

    public function create(CreateCustomer $request)
    {
        return $this->customerService->create($request);
    }

    public function show($id)
    {
        return $this->customerService->show($id)?? response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
    }

    public function update(Request $request, $id)
    {
        return $this->customerService->update($request,$id);
    }

    public function delete(Request $request, $id)
    {
        return $this->customerService->delete($request,(int)$id);
    }
}
