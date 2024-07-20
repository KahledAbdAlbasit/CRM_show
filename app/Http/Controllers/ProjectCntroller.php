<?php

namespace App\Http\Controllers;

use Crm\Customer\Services\CustomerService;
use Crm\Project\Requests\CreateProject;
use Crm\Project\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectCntroller extends Controller
{
    private ProjectService  $projectsService;
    private CustomerService $customerService;
    public function __construct(ProjectService  $projectsService,CustomerService $customerService)
    {
        $this->projectsService = $projectsService;
        $this->customerService = $customerService;
    }

    public function createProject(CreateProject  $request,$customerId){
        $customer = $this->customerService->show($customerId);
        if(!$customer){
            return response()->json(['status' => 'Customer NOT FOUND'], Response::HTTP_NOT_FOUND);;
        }
        return $this->projectsService->createProject($request,$customerId);
    }
}
