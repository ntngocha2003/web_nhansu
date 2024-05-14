<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DepartmentResource;
use App\Services\Interfaces\Department\DepartmentServiceInterface as DepartmentService;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface as DepartmentRepository;
use App\Repositories\Interfaces\Position\PositionRepositoryInterface as PositionRepository;
use App\Http\Requests\Department\DepartmentStoreRequest;
use App\Http\Requests\Department\DepartmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Validation\Validator;

class ApiDepartmentController extends Controller
{
    protected $departmentService;
    protected $departmentRepository;
    protected $positionRepository;
    public function __construct(
        DepartmentService $departmentService,
        DepartmentRepository $departmentRepository,
        PositionRepository $positionRepository
    ){
        $this->departmentService= $departmentService;
        $this->departmentRepository= $departmentRepository;
        $this->positionRepository= $positionRepository;
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
        ],500);
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
        ],500);
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
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->departmentService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->departmentRepository->getAll(),
                'message'=>'Xóa dữ liệu thành công'

            ],200);
        }
        else{
            return response()->json([
                'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách phòng ban'
            ],500);
        }
        
    }

    public function showPositiontoId(Request $request){
        $position=[];
        $repository=($request->input('relation')=='positions')? 'departmentRepository':'positionRepository';
        $model=$this->{$repository}->findById($request->input('id'),['id','name'],[$request->input('relation')]);
        
        return response()->json([
            'message'=>'Truy xuất dữ liệu thành công',
            'data'=>$model->{$request->input('relation')}
        ],200);
    }
}
    

