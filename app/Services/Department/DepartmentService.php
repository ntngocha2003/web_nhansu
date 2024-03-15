<?php
namespace App\Services\Department;
use App\Services\Interfaces\Department\DepartmentServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Department;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface as DepartmentRepository;
use Illuminate\Support\Facades\Hash;

class DepartmentService implements DepartmentServiceInterface{
   
    protected $departmentRepository;
    public function __construct(
        DepartmentRepository $departmentRepository
    )
    {
        $this->departmentRepository=$departmentRepository;
    }
    public function paginate($request){
       $department=$this->departmentRepository->pagination([
            'departmentId',
            'nameDepartment',
            'description'
           ]);
        return $department;
       ;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->departmentRepository->create($create);
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
            $this->departmentRepository->update($id,$update);
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
            $this->departmentRepository->delete($id);
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
            $this->departmentRepository->deleteAll($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}