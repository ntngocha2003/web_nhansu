<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'age'=>$this->age,
            'address'=>$this->address,
            'identification'=>$this->identification,
            'departmentId'=>$this->departmentId,
            'positionId'=>$this->positionId,
            'levelId' =>$this->levelId,
            'specializedId'=>$this->specializedId,
            'salaryId'=>$this->salaryId
        ];
    }
}