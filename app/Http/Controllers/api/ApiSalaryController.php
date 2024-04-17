<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\SalaryResource;
use App\Services\Interfaces\Salary\SalaryServiceInterface as SalaryService;
use App\Repositories\Interfaces\Salary\SalaryRepositoryInterface as SalaryRepository;
use App\Http\Requests\Salary\SalaryStoreRequest;
use App\Http\Requests\Salary\SalaryUpdateRequest;
use Illuminate\Http\RedirectResponse;

class ApiSalaryController extends Controller
{
    protected $salaryService;
    public function __construct(
        SalaryService $salaryService,
        SalaryRepository $salaryRepository
    ){
        $this->salaryService= $salaryService;
        $this->salaryRepository= $salaryRepository;
    }

    public function index(Request $request){
        $salary=$this->salaryService->paginate($request);
        return response()->json([
            'status'=>200,
            'data'=>$salary,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $salary=$this->salaryRepository->findById($id);
        $salaryItem= new SalaryResource($salary);
        return response()->json([
            'status'=>200,
            'data'=>$salaryItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->salaryRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(SalaryStoreRequest $request){
        if($this->salaryService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->salaryRepository->getAll(),
                'message'=>'Thêm mới trình độ thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm trình độ'
        ],500);
    }

    public function update($id,SalaryUpdateRequest $request){ 

        if($this->salaryRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->salaryService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->salaryRepository->findById($id),
                'message'=>'Cập nhật trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],500);
    }

    public function delete($id){
        if($this->salaryRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->salaryService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->salaryRepository->getAll(),
                'message'=>'Xóa trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa trình độ'
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->salaryService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->salaryRepository->getAll(),
                'message'=>'Xóa dữ liệu thành công'

            ],200);
        }
        else{
            return response()->json([
                'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách trình độ'
            ],500);
        }
        
    }
}
    
