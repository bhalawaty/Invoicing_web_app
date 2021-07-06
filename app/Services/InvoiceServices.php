<?php

namespace App\Services;

use App\Entities\InvoiceEntities;
use App\Entities\UsersEntities;
use App\Mail\InvoiceMail;
use App\Repositories\InvoiceRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Mail;

class InvoiceServices
{


    /**
     * @var UsersRepository
     * @var InvoiceRepository
     */
    private $usersRepository;
    private $invoiceRepository;
    /**
     * @var UsersServices
     */
    private $usersServices;


    public function __construct(UsersServices $usersServices, InvoiceRepository $invoiceRepository, UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->usersServices = $usersServices;

    }


    /**
     * @param InvoiceEntities $invoiceEntities
     * @param UsersEntities $UsersEntities
     * @return mixed
     */
    public function store(InvoiceEntities $invoiceEntities, UsersEntities $UsersEntities)
    {
        $user = $this->usersServices->userCheck($UsersEntities);
        $invoiceEntities->setUserId($user->id);
        $invoice = $this->invoiceRepository->create($invoiceEntities->getAttributesArray());
        $this->SendMail($user, $invoice->toArray());
        return $invoice;
    }

    /**
     * @param  $user
     * @param $invoice
     */
    protected function SendMail($user, $invoice): void
    {
        Mail::to($user->email)->send(new InvoiceMail($invoice));
    }


}
