<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScope;

class Employee extends Model
{
    use  HasFactory,QueryScope;

    protected $primaryKey='id';
    public $timestamps=false;
  
    protected $fillable = ['name', 'email','phone','age','address','identification','departmentId',
    'positionId','levelId','specializedId','salaryId'];


    public function departments(){
        return $this->belongsTo(Department::class,'id');
    }

    public function positions(){
        return $this->belongsTo(Position::class,'id');
    }
}
