<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScope;

class Level extends Model
{
    protected $primaryKey='id';
    public $timestamps=false;
    use HasFactory,QueryScope;
    protected $fillable = ['name', 'description'];

    public function employees(){
        return $this->hasMany(Employee::class,'levelId');
    }
}
