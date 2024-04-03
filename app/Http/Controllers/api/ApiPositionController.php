<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\PositionResource;
use App\Services\Interfaces\Position\PositionServiceInterface as PositionService;
use App\Repositories\Interfaces\Position\PositionRepositoryInterface as PositionRepository;
use App\Http\Requests\Position\PositionStoreRequest;
use App\Http\Requests\Position\PositionUpdateRequest;
use Illuminate\Http\RedirectResponse;

class ApiPositionController extends Controller
{
    protected $positionService;
    public function __construct(
        PositionService $positionService,
        PositionRepository $positionRepository
    ){
        $this->positionService= $positionService;
        $this->positionRepository= $positionRepository;
    }

    public function index(Request $request){
    $position=$this->positionService->paginate($request);
        return response()->json([
            'status'=>200,
            'data'=>$position,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $position=$this->positionRepository->findById($id);
        $positionItem= new PositionResource($position);
        return response()->json([
            'status'=>200,
            'data'=>$positionItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->positionRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(PositionStoreRequest $request){
        if($this->positionService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->positionRepository->getAll(),
                'message'=>'Thêm mới chức vụ thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm chức vụ'
        ],500);
    }

    public function update($id,PositionUpdateRequest $request){ 

        if($this->positionRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->positionService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->positionRepository->findById($id),
                'message'=>'Cập nhật chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],500);
    }

    public function delete($id){
        if($this->positionRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->positionService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->positionRepository->getAll(),
                'message'=>'Xóa chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa chức vụ'
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->positionService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->positionRepository->getAll(),
                'message'=>'Xóa dữ liệu thành công'

            ],200);
        }
        else{
            return response()->json([
                'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách phòng ban'
            ],500);
        }
        
    }
}
    


