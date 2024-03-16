<?php
namespace App\Services\Level;
use App\Services\Interfaces\Level\LevelServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Level;
use App\Repositories\Interfaces\Level\LevelRepositoryInterface as LevelRepository;
use Illuminate\Support\Facades\Hash;

class LevelService implements LevelServiceInterface{
   
    protected $levelRepository;
    public function __construct(
        LevelRepository $levelRepository
    )
    {
        $this->levelRepository=$levelRepository;
    }
    public function paginate($request){
       $level=$this->levelRepository->pagination([
            'levelId',
            'nameLevel',
           ]);
        return $level;
       ;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->levelRepository->create($create);
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
            $this->levelRepository->update($id,$update);
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
            $this->levelRepository->delete($id);
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
            $this->levelRepository->deleteAll($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}