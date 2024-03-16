<?php
namespace App\Repositories\Specialized;
use App\Repositories\Interfaces\Specialized\SpecializedRepositoryInterface;
use App\Models\Specialized;
use App\Repositories\BaseRepository;
class SpecializedRepository extends BaseRepository implements SpecializedRepositoryInterface{

    protected $model;

    public function __construct(
        Specialized $model
    ){
        $this->model=$model;
    }

}