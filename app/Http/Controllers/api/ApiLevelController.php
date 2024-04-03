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
            'status'=>200,
            'data'=>$level,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $level=$this->levelRepository->findById($id);
        $levelItem= new LevelResource($level);
        return response()->json([
            'status'=>200,
            'data'=>$levelItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->levelRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(LevelStoreRequest $request){
        if($this->levelService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->levelRepository->getAll(),
                'message'=>'Thêm mới trình độ thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm trình độ'
        ],500);
    }

    public function update($id,LevelUpdateRequest $request){ 

        if($this->levelRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->levelService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->levelRepository->findById($id),
                'message'=>'Cập nhật trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],500);
    }

    public function delete($id){
        if($this->levelRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->levelService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->levelRepository->getAll(),
                'message'=>'Xóa trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa trình độ'
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->levelService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->levelRepository->getAll(),
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