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
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$salary
        ],200);
    }
 
    public function show($id){
        $salary=$this->salaryRepository->findById($id);
        $salarytItem= new SalaryResource($salary);
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$salarytItem
        ],200);
    }
    public function showAll(){
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$this->salaryRepository->getAll()
        ],200);
    }

    public function store(SalaryStoreRequest $request){
        if($this->salaryService->create($request)==true){

            return response()->json([
                'message'=>'Thêm mới lương thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm lương'
        ]);
    }

    public function update($id,SalaryUpdateRequest $request){      
        if($this->salaryService->update($id,$request)==true){
            return response()->json([
                'message'=>'Cập nhật lương thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật lương'
        ]);
    }

    public function delete($id){
        if($this->salaryService->delete($id)==true){
            return response()->json([
                'message'=>'Xóa lương thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa lương'
        ]);
        
    }

    public function deleteAll(Request $request){
        if($this->salaryService->deleteAll($request)==true){
            return response()->json([
                'message'=>'Xóa danh sách lương thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách lương'
        ]);
        
    }
}
    
