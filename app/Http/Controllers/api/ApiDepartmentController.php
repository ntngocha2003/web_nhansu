<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DepartmentResource;
use App\Services\Interfaces\Department\DepartmentServiceInterface as DepartmentService;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface as DepartmentRepository;
use App\Http\Requests\Department\DepartmentStoreRequest;
use App\Http\Requests\Department\DepartmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Validation\Validator;

class ApiDepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(
        DepartmentService $departmentService,
        DepartmentRepository $departmentRepository
    ){
        $this->departmentService= $departmentService;
        $this->departmentRepository= $departmentRepository;
    }

    public function index(Request $request){
        $department=$this->departmentService->paginate($request);
        return response()->json([
            'status'=>200,
            'data'=>$department,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $department=$this->departmentRepository->findById($id);
        $departmentItem= new DepartmentResource($department);
        return response()->json([
            'status'=>200,
            'data'=>$departmentItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->departmentRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(DepartmentStoreRequest $request){
        if($this->departmentService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->departmentRepository->getAll(),
                'message'=>'Thêm mới phòng ban thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm phòng ban'
        ],422);
    }

    public function update($id,DepartmentUpdateRequest $request){ 

        if($this->departmentRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->departmentService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->departmentRepository->findById($id),
                'message'=>'Cập nhật phòng ban thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],422);
    }

    public function delete($id){
        if($this->departmentRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->departmentService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->departmentRepository->getAll(),
                'message'=>'Xóa phòng ban thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa phòng ban'
        ],422);
        
    }

    public function deleteAll(Request $request){
        if($this->departmentService->deleteAll($request)==true){
            return response()->json([
                'data'=>$this->departmentRepository->getAll(),
                'message'=>'Xóa danh sách phòng ban thành công'

            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách phòng ban'
        ],);
        
    }
}
    

