<?php

namespace App\Http\Controllers\Api;

use App\Utils\HttpStatusCodeUtil;
use App\Entities\InvoiceEntities;
use App\Entities\UsersEntities;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Services\InvoiceServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        DB::beginTransaction();
        try {
            $user = $this->usersServices->userCheck($UsersEntities);
            $InvoiceEntities->setUserId($user->id);
            $invoice = $this->invoiceServices->store($InvoiceEntities);
            $this->invoiceServices->sendMail($user, $invoice->toArray());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage(), compact("exception"));
            $payload = [
                "errors" => [
                    "message" => $exception->getMessage()
                ]
            ];
            return $this->response($payload, HttpStatusCodeUtil::INTERNAL_SERVER_ERROR);
        }


        return InvoiceResource::make($invoice);
    }
}
