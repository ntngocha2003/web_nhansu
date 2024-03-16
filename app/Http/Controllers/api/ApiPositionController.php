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
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$position
        ],200);
    }
 
    public function show($id){
        $position=$this->positionRepository->findById($id);
        $positiontItem= new PositionResource($position);
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$positiontItem
        ],200);
    }
    public function showAll(){
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$this->positionRepository->getAll()
        ],200);
    }

    public function store(PositionStoreRequest $request){
        if($this->positionService->create($request)){

            return response()->json([
                'message'=>'Thêm mới chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm chức vụ'
        ]);
    }

    public function update($id,PositionUpdateRequest $request){      
        if($this->positionService->update($id,$request)==true){
            return response()->json([
                'message'=>'Cập nhật chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật chức vụ'
        ]);
    }

    public function delete($id){
        if($this->positionService->delete($id)==true){
            return response()->json([
                'message'=>'Xóa chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa chức vụ'
        ]);
        
    }

    public function deleteAll(Request $request){
        if($this->positionService->deleteAll($request)==true){
            return response()->json([
                'message'=>'Xóa danh sách chức vụ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách chức vụ'
        ]);
        
    }
}
    


