<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\LevelResource;
use App\Services\Interfaces\Level\LevelServiceInterface as LevelService;
use App\Repositories\Interfaces\Level\LevelRepositoryInterface as LevelRepository;
use App\Http\Requests\Level\LevelStoreRequest;
use App\Http\Requests\Level\LevelUpdateRequest;
use Illuminate\Http\RedirectResponse;

class ApiLevelController extends Controller
{
    protected $levelService;
    public function __construct(
        LevelService $levelService,
        LevelRepository $levelRepository
    ){
        $this->levelService= $levelService;
        $this->levelRepository= $levelRepository;
    }

    public function index(Request $request){
        $level=$this->levelService->paginate($request);
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$level
        ],200);
    }
 
    public function show($id){
        $level=$this->levelRepository->findById($id);
        $leveltItem= new LevelResource($level);
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$leveltItem
        ],200);
    }
    public function showAll(){
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$this->levelRepository->getAll()
        ],200);
    }

    public function store(LevelStoreRequest $request){
        if($this->levelService->create($request)==true){

            return response()->json([
                'message'=>'Thêm mới trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm trình độ'
        ]);
    }

    public function update($id,LevelUpdateRequest $request){      
        if($this->levelService->update($id,$request)==true){
            return response()->json([
                'message'=>'Cập nhật trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật trình độ'
        ]);
    }

    public function delete($id){
        if($this->levelService->delete($id)==true){
            return response()->json([
                'message'=>'Xóa trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa trình độ'
        ]);
        
    }

    public function deleteAll(Request $request){
        if($this->levelService->deleteAll($request)==true){
            return response()->json([
                'message'=>'Xóa danh sách trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách trình độ'
        ]);
        
    }
}