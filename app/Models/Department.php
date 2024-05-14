<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScope;

class Department extends Model
{
    protected $primaryKey='id';
    public $timestamps=false;
    use HasFactory,QueryScope;
    protected $fillable = ['name','description'];

    public function employees(){
        return $this->hasMany(Employee::class,'departmentId');
    }

    public function positions(){
        return $this->hasMany(Position::class,'departmentId','id');
    }
}
