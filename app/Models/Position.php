<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey='positionId';
    public $timestamps=false;
    use HasFactory;
    protected $fillable = ['namePosition','description'];
}
