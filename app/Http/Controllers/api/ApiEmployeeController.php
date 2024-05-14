<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\EmployeeResource;
use App\Services\Interfaces\Employee\EmployeeServiceInterface as EmployeeService;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface as EmployeeRepository;
use App\Http\Requests\Employee\EmployeeStoreRequest;
use App\Http\Requests\Employee\EmployeeUpdateRequest;
use Illuminate\Http\RedirectResponse;

class ApiEmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(
        EmployeeService $employeeService,
        EmployeeRepository $employeeRepository
    ){
        $this->employeeService= $employeeService;
        $this->employeeRepository= $employeeRepository;
    }

    public function index(Request $request){
    $employee=$this->employeeService->paginate($request);
        return response()->json([
            'status'=>200,
            'data'=>$employee,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $employee=$this->employeeRepository->findById($id);
        $employeeItem= new EmployeeResource($employee);
        return response()->json([
            'status'=>200,
            'data'=>$employeeItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->employeeRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(EmployeeStoreRequest $request){
        if($this->employeeService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->employeeRepository->getAll(),
                'message'=>'Thêm mới nhân viên thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm nhân viên'
        ],500);
    }

    public function update($id,EmployeeUpdateRequest $request){ 

        if($this->employeeRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->employeeService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->employeeRepository->findById($id),
                'message'=>'Cập nhật nhân viên thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],500);
    }

    public function delete($id){
        if($this->employeeRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->employeeService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->employeeRepository->getAll(),
                'message'=>'Xóa nhân viên thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa nhân viên'
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->employeeService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->employeeRepository->getAll(),
                'message'=>'Xóa dữ liệu thành công'

            ],200);
        }
        else{
            return response()->json([
                'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách nhân viên'
            ],500);
        }
        
    }
}
    



