<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey='departmentId';
    public $timestamps=false;
    use HasFactory;
    protected $fillable = ['nameDepartment','description'];

    public function employees(){
        return $this->hasMany(Employee::class,'employeeId');
    }
}
