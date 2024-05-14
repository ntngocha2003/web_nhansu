<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScope;

class Specialized extends Model
{
    protected $primaryKey='id';
    public $timestamps=false;
    use HasFactory,QueryScope;
    protected $fillable = ['levelId','name','description'];

    public function employees(){
        return $this->hasMany(Employee::class,'specializedId');
    }

    public function level(){
        return $this->beloginTo(Level::class,'specializedId','id');
    }
}
