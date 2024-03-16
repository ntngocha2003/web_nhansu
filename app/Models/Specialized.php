<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialized extends Model
{
    protected $primaryKey='specializedId';
    public $timestamps=false;
    use HasFactory;
    protected $fillable = ['nameSpecialized','description'];
}
