<?php
namespace App\Repositories\Employee;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface;
use App\Models\Employee;
use App\Repositories\BaseRepository;
class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface{

    protected $model;

    public function __construct(
        Employee $model
    ){
        $this->model=$model;
    }

}