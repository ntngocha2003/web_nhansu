<?php
namespace App\Services\Salary;
use App\Services\Interfaces\Salary\SalaryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Salary;
use App\Repositories\Interfaces\Salary\SalaryRepositoryInterface as SalaryRepository;
use Illuminate\Support\Facades\Hash;

class SalaryService implements SalaryServiceInterface{
   
    protected $salaryRepository;
    public function __construct(
        SalaryRepository $salaryRepository
    )
    {
        $this->salaryRepository=$salaryRepository;
    }
    public function paginate($request){
        $perpage=($request->input('perpage'))? $request->input('perpage'):10;
       
        $salary=$this->salaryRepository->paginate($perpage);
        return $salary;
    }

    public function create($request){
   
        DB::beginTransaction();
        try { 
            $create=$request->all();
            $this->salaryRepository->create($create);
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
            $this->salaryRepository->update($id,$update);
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
            $this->salaryRepository->delete($id);
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
            $this->salaryRepository->deleteMultiple($ids);
            DB::commit();
            return true;            
           
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}