<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializedResource extends JsonResource
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
            'levelId'=>$this->levelId,
            'name'=>$this->name,
            'description'=>$this->description,
            'employees_count'=>$this->employees_count
        ];
    }
}