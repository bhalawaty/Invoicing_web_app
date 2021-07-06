<?php

namespace App\Http\Controllers\Api;

use App\Entities\InvoiceEntities;
use App\Entities\UsersEntities;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Services\InvoiceServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{


    /**
     * @var InvoiceServices
     */
    private $invoiceServices;
    /**
     * @var UsersServices
     */
    private $usersServices;

    public function __construct(UsersServices $usersServices, InvoiceServices $invoiceServices)
    {
        $this->invoiceServices = $invoiceServices;
        $this->usersServices = $usersServices;


    }


    /**
     * @param InvoiceRequest $request
     */
    public function store(InvoiceRequest $request)
    {
        $InvoiceEntities = InvoiceEntities::fromRequest($request);
        $UsersEntities = UsersEntities::fromRequest($request);
        $invoice = $this->invoiceServices->store($InvoiceEntities, $UsersEntities);
        return InvoiceResource::make($invoice);
    }
}
