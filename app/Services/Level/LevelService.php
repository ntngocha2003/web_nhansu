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
    protected $fieldSearch=['name'];
    public function __construct(
        LevelRepository $levelRepository
    )
    {
        $this->levelRepository=$levelRepository;
    }
    public function paginate($request){
        $perpage=($request->input('perpage'))? $request->input('perpage'):10;
        $condition=[
            'keyword'=>$request->input('keyword')
        ];
        $level=$this->levelRepository->pagination($perpage,$condition,$this->fieldSearch);
        return $level;
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

    public function deleteMultiple($request){
        DB::beginTransaction();
        try {
            $ids=explode(',',$request->input('ids'));
            $this->levelRepository->deleteMultiple($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}