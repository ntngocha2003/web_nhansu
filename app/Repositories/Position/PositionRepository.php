<?php
namespace App\Repositories\Position;
use App\Repositories\Interfaces\Position\PositionRepositoryInterface;
use App\Models\Position;
use App\Repositories\BaseRepository;
class PositionRepository extends BaseRepository implements PositionRepositoryInterface{

    protected $model;

    public function __construct(
        Position $model
    ){
        $this->model=$model;
    }

}