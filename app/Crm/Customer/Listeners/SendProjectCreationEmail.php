<?php


namespace Crm\Customer\Listeners;

use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Services\CustomerService;
use Crm\Project\Events\ProjectCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProjectCreationEmail
{
    private CustomerService $customerService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        $project = $event->getProject();
        $customer =  $this->customerService->show($project->customer_id);
        dd($project,$customer);
    }
}
