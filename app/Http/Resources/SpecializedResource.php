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
            'specializedId'=>$this->specializedId,
            'nameSpecialized'=>$this->nameSpecialized,
            'description'=>$this->description
        ];
    }
}