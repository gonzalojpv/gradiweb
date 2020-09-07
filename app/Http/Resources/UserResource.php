<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'full_name'    => $this->first_name ." ". $this->last_name,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->email,
            'phone_number' => $this->phone_number,
            'age'          => $this->age,
            'birthdate'    => $this->birthdate,
            'admin'        => $this->admin,
            'token'        => $this->createToken('MyApp')->accessToken,
            'created_at'   => $this->created_at,
        ];
    }
}
