<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\SpecializedResource;
use App\Services\Interfaces\Specialized\SpecializedServiceInterface as SpecializedService;
use App\Repositories\Interfaces\Specialized\SpecializedRepositoryInterface as SpecializedRepository;
use App\Http\Requests\Specialized\SpecializedStoreRequest;
use App\Http\Requests\Specialized\SpecializedUpdateRequest;
use Illuminate\Http\RedirectResponse;

class ApiSpecializedController extends Controller
{
    protected $specializedService;
    public function __construct(
        SpecializedService $specializedService,
        SpecializedRepository $specializedRepository
    ){
        $this->specializedService= $specializedService;
        $this->specializedRepository= $specializedRepository;
    }

    public function index(Request $request){
        $specialized=$this->specializedService->paginate($request);
        return response()->json([
            'status'=>200,
            'data'=>$specialized,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
 
    public function show($id){
        $specialized=$this->specializedRepository->findById($id);
        $specializedItem= new LevelResource($specialized);
        return response()->json([
            'status'=>200,
            'data'=>$specializedItem,
            'message'=>'Truy vấn dữ liệu thành công'
        ],200);
    }
    public function showAll(){
        return response()->json([
            'status'=>200,
            'data'=>$this->specializedRepository->getAll(),
            'message'=>'Truy vấn dữ liệu thành công',
        ],200);
    }

    public function store(SpecializedStoreRequest $request){
        if($this->specializedService->create($request)==true){

            return response()->json([
                'status'=>200,
                'data'=>$this->specializedRepository->getAll(),
                'message'=>'Thêm mới trình độ thành công'
            ]);
        }
        
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm trình độ'
        ],500);
    }

    public function update($id,SpecializedUpdateRequest $request){ 

        if($this->specializedRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->specializedService->update($id,$request)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->specializedRepository->findById($id),
                'message'=>'Cập nhật trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật'
        ],500);
    }

    public function delete($id){
        if($this->specializedRepository->findId($id)===false){
            return 'not found';
        }
        else if($this->specializedService->delete($id)==true){
            return response()->json([
                'status'=>200,
                'data'=>$this->specializedRepository->getAll(),
                'message'=>'Xóa trình độ thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa trình độ'
        ],500);
        
    }

    public function deleteMultiple(Request $request){
        if($this->specializedService->deleteMultiple($request)==true){
            return response()->json([
                'data'=>$this->specializedRepository->getAll(),
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
