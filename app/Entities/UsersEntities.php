<?php

namespace App\Entities;

class UsersEntities
{


    private $name;
    private $mobile;
    private $email;


    public static function fromRequest($request)
    {
        $UsersEntities = new UsersEntities();
        $UsersEntities->setName($request->name);
        $UsersEntities->setMobile($request->mobile);
        $UsersEntities->setEmail($request->email);


        return $UsersEntities;


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


    public function getAttributesArray()
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'mobile' => $this->getMobile(),
        ];
    }

}
