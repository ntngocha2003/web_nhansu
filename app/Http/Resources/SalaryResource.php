<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->salaryId,
            'salaryStep'=>$this->salaryStep,
            'basicSalary'=>$this->basicSalary,
            'coefficientsSalary'=>$this->coefficientsSalary,
            'allowanceCoefficient'=>$this->allowanceCoefficient
        ];
    }
}