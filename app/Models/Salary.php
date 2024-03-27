<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $primaryKey='salaryId';
    public $timestamps=false;
    use HasFactory;
    protected $fillable = ['salaryStep','basicSalary','coefficientsSalary','allowanceCoefficient'];
}
