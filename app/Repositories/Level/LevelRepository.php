<?php
namespace App\Repositories\Level;
use App\Repositories\Interfaces\Level\LevelRepositoryInterface;
use App\Models\Level;
use App\Repositories\BaseRepository;
class LevelRepository extends BaseRepository implements LevelRepositoryInterface{

    protected $model;

    public function __construct(
        Level $model
    ){
        $this->model=$model;
    }

}