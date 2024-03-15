<?php
namespace App\Repositories\Department;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface;
use App\Models\Department;
use App\Repositories\BaseRepository;
class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface{

    protected $model;

    public function __construct(
        Department $model
    ){
        $this->model=$model;
    }

}