<?php
namespace App\Services\Employee;
use App\Services\Interfaces\Employee\EmployeeServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Employee;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface as EmployeeRepository;
use Illuminate\Support\Facades\Hash;

class EmployeeService implements EmployeeServiceInterface{
   
    protected $employeeRepository;
    protected $fieldSearch=['name'];
    public function __construct(
        EmployeeRepository $employeeRepository
    )
    {
        $this->employeeRepository=$employeeRepository;
    }
    public function paginate($request){
        $perpage=($request->input('perpage'))? $request->input('perpage'):10;
        $condition=[
            'keyword'=>$request->input('keyword')
        ];
        $employee=$this->employeeRepository->paginate2($perpage,$condition,$this->fieldSearch);
        return $employee;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->employeeRepository->create($create);
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
            $this->employeeRepository->update($id,$update);
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
            $this->employeeRepository->delete($id);
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
            $this->employeeRepository->deleteMultiple($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}