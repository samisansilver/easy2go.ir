<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tour extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'price' => $this->price,
            'hotel_name' => $this->hotel_name,
        ];
    }
    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
