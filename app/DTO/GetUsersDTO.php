<?php

namespace App\DTO;

class GetUsersDTO
{
    public $name;
    public $age;
    public $address;
    public $email;

    public function __construct($data){
        return $this->convertData($data);
    }

    public function convertData($data){
        $tempArr= array();
        foreach ($data as $item){
            $this->name = $item->name;
            $this->age = $item->age;
            $this->email = $item->email;
            $this->address = $item->address;
        }
    }
}
