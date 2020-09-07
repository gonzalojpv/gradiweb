<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CarResource extends JsonResource
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
            'id'    => $this->id,
            'alias' => $this->alias,
            'plate' => $this->plate,
            'brand' => $this->brand,
            'type'  => $this->type,
            'model' => $this->model,
            'user' => $this->user,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d'),
        ];
    }
}
