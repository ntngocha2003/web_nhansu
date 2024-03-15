@include('admin.room.component.breadcrumb',['title'=>$config['seo']['delete']['title']])

<form action="{{route('room.destroy', ['room' => $room->roomId, 'pageIndex' => $pageIndex])}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">
                        Thông tin phòng cần xóa
                    </div>
                    <div class="panel-description">
                        <p>Bạn có chắc chắn xóa không ?</p>
                        <p>Lưu ý: Dữ liệu sẽ không thể khối phục <span class="text-danger">(*)</span> sau khi xóa</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-right">
                                        Tên phòng
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="nameRoom"
                                        class="form-control"
                                        placeholder=""
                                       
                                        value="{{$room->nameRoom}}"
                                    />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-right">
                                        Mô tả
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        placeholder=""
                                        value="{{$room->description}}"
                                    />
                                    
                                </div>
                            </div>
                        </div>

                        
                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Gía phòng
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="price"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$room->price}}"
                                    />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Trạng thái
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="status"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$room->status}}"
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb15 mb15" type="submit"name="send"value="">Xóa phòng</button>
        <a class="btn btn-danger mb15" href="{{route('room.index')}}" name="exit"value="">Hủy bỏ</a>
    </div>
</form>