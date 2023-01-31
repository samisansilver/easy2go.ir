<?php

namespace App\Http\Controllers;

use App\DTO\GetUsersDTO;
use http\Client;
use League\Uri\Http;

class TestController extends Controller
{
    public function getUsers(){
        $data = array(
          [
                "name" => "saman",
                "address" => [
                    "address1" => "tehran - iran",
                    "address2" => "hamadan - iran"
                ],
                "email" => "saman@gmail.com",
                "sex" => "male",
                "phone" => "091234687",
                "loan" => 0,
                "age" => 29,
            ] ,
            [
                "name" => "sina",
                "address" => [
                    "address1" => "tehran - iran",
                    "address2" => "Amol - iran"
                ],
                "email" => "sina@gmail.com",
                "sex" => "male",
                "phone" => "091234687",
                "loan" => 0,
                "age" => 32
            ]
        );
/*
        $tempArr= array();

        foreach ($data as $temp){
            $tempArr[]=(object)$data;
        }


        $ll=array();
        foreach ($tempArr as $item){
//            $ll[]=$item->address["address2"];
            $ll[] = [
                "address2" => $item->address["address2"],
                "email" => $item->email
            ];
        }
        return response($ll);*/

        $ary = array();
        foreach ($data as $item){
            $ary[] = (object)$item['address']['address2'];
//            return $ary;
        }

        return $ary;

    }
}
