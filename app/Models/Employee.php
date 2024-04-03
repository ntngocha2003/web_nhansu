<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use  HasFactory;

    protected $primaryKey='employeeId';
    public $timestamps=false;
  
    protected $fillable = ['name', 'email', 'password', 'phone','age','address','identification','departmentId',
    'positionId','levelId','specializedId','salaryId'];


    public function departments(){
        return $this->belongsTo(Department::class,'id');
    }
}
