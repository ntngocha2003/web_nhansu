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
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$specialized
        ],200);
    }
 
    public function show($id){
        $specialized=$this->specializedRepository->findById($id);
        $specializedtItem= new SpecializedResource($specialized);
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$specializedtItem
        ],200);
    }
    public function showAll(){
        return response()->json([
            'message'=>'Truy vấn dữ liệu thành công',
            'data'=>$this->specializedRepository->getAll()
        ],200);
    }

    public function store(SpecializedStoreRequest $request){
        if($this->specializedService->create($request)==true){

            return response()->json([
                'message'=>'Thêm mới chuyên ngành thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện thêm chuyên ngành'
        ]);
    }

    public function update($id,SpecializedUpdateRequest $request){      
        if($this->specializedService->update($id,$request)==true){
            return response()->json([
                'message'=>'Cập nhật chuyên ngành thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện cập nhật chuyên ngành'
        ]);
    }

    public function delete($id){
        if($this->specializedService->delete($id)==true){
            return response()->json([
                'message'=>'Xóa chuyên ngành thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa chuyên ngành'
        ]);
        
    }

    public function deleteAll(Request $request){
        if($this->specializedService->deleteAll($request)==true){
            return response()->json([
                'message'=>'Xóa danh sách chuyên ngành thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Có lỗi xảy ra khi thực hiện xóa danh sách chuyên ngành'
        ]);
        
    }
}
