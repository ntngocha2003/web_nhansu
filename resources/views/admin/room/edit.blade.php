@include('admin.room.component.breadcrumb',['title'=>$config['seo']['edit']['title']])

<form action="{{route('room.update', ['room' => $room->roomId, 'pageIndex' => $pageIndex])}}" method="post" class="box">
    @csrf
    @method('PUT')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">
                        Thông tin phòng
                    </div>
                    <div class="panel-description">
                        <p>Cập nhập thông tin phòng</p>
                        <p>Lưu ý những trường đánh dấu<span class="text-danger">(*)</span> là bắt buộc</p>
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
                                        type="number"
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

        <button class="btn btn-primary mb15" type="submit"name="send"value="">Lưu thông tin</button>
        <a class="btn btn-danger mb15" href="{{route('room.index')}}" name="exit"value="">Hủy bỏ</a>
    </div>
</form>