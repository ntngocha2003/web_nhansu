<?php
namespace App\Services\Specialized;
use App\Services\Interfaces\specialized\SpecializedServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Specialized;
use App\Repositories\Interfaces\Specialized\SpecializedRepositoryInterface as SpecializedRepository;
use Illuminate\Support\Facades\Hash;

class SpecializedService implements SpecializedServiceInterface{
   
    protected $specializedRepository;
    public function __construct(
        SpecializedRepository $specializedRepository
    )
    {
        $this->specializedRepository=$specializedRepository;
    }
    public function paginate($request){
       $specialized=$this->specializedRepository->pagination([
            'specializedId',
            'nameSpecialized',
            'description'
           ]);
        return $specialized;
       ;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->specializedRepository->create($create);
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
            $this->specializedRepository->update($id,$update);
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
            $this->specializedRepository->delete($id);
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
            $this->specializedRepository->deleteAll($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}