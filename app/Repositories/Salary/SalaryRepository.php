<?php
namespace App\Repositories\Salary;
use App\Repositories\Interfaces\Salary\SalaryRepositoryInterface;
use App\Models\Salary;
use App\Repositories\BaseRepository;
class SalaryRepository extends BaseRepository implements SalaryRepositoryInterface{

    protected $model;

    public function __construct(
        Salary $model
    ){
        $this->model=$model;
    }

}