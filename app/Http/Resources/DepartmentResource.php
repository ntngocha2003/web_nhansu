<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'departmentId'=>$this->departmentId,
            'nameDepartment'=>$this->nameDepartment,
            'description'=>$this->description
        ];
    }
}
