<?php

namespace App\Entities;

class InvoiceEntities
{


    private $name;
    private $mobile;
    private $email;
    private $amount;
    private $due_date;
    private $user_id;


    public static function fromRequest($request)
    {
        $InvoiceEntities = new InvoiceEntities();
        $InvoiceEntities->setName($request->name);
        $InvoiceEntities->setMobile($request->mobile);
        $InvoiceEntities->setEmail($request->email);
        $InvoiceEntities->setAmount($request->amount);
        $InvoiceEntities->setDueDate($request->due_date);
//        $InvoiceEntities->setUserId($request->user_id);


        return $InvoiceEntities;


    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date): void
    {
        $this->due_date = $due_date;
    }


    public function getAttributesArray()
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'mobile' => $this->getMobile(),
            'amount' => $this->getAmount(),
            'due_date' => $this->getDueDate(),
            'user_id' => $this->getUserId(),

        ];
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
}
