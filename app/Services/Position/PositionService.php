<?php
namespace App\Services\Position;
use App\Services\Interfaces\Position\PositionServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Position;
use App\Repositories\Interfaces\Position\PositionRepositoryInterface as PositionRepository;
use Illuminate\Support\Facades\Hash;

class PositionService implements PositionServiceInterface{
   
    protected $positionRepository;
    public function __construct(
        PositionRepository $positionRepository
    )
    {
        $this->positionRepository=$positionRepository;
    }
    public function paginate($request){
       $position=$this->positionRepository->pagination([
            'positionId',
            'nameposition',
            'description'
           ]);
        return $position;
       ;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->positionRepository->create($create);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function update($id,$request){
        DB::beginTransaction();
        try { 
            $update=$request->all();
            $this->positionRepository->update($id,$update);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id){
        DB::beginTransaction();
        try {
            $this->positionRepository->delete($id);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAll($request){
        DB::beginTransaction();
        try {
            $ids=explode(',',$request->input('ids'));
            $this->positionRepository->deleteAll($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}