<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class BaseRepository implements BaseRepositoryInterface{
    protected $model;

    public function __construct(
        Model $model
    ){
        $this->model=$model;
    }
    
    public function pagination(
        array $param=[],
    )
    {
       return $this->model->paginate($param['perpage']);
    }

    public function getAll(){
        return  $this->model::all();
    }

    public function create(array $create=[]){
        $model= $this->model->create($create);
        return $model->fresh();
    }

    public function update(int $id=0,array $update=[]){
        $model= $this->findById($id);
        return $model->update($update);
    }

    public function delete(int $id=0){
        $model= $this->findById($id);
        return $model->destroy($id);
    }

    public function deleteAll(array $ids=[]){
        return $this->model->whereIn('departmentId',$ids)->delete();
    }

    public function findById(
        int $modelId,
        array $column=['*'],
        array $reletion=[]
        ){
        return $this->model->select($column)->with($reletion)->findOrFail($modelId);
    }

    public function findId($id){
        if($this->model->find($id)){
            return true;
        }
        else{
            return false;
        }
        
    }
}