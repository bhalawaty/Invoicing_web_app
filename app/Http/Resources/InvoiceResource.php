<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->name,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
        ];
    }
}
