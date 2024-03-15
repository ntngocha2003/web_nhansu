@include('admin.user.component.breadcrumb',['title'=>$config['seo']['delete']['title']])

<form action="{{route('user.destroy', ['user' => $user->userId, 'pageIndex' => $pageIndex])}}" method="post" class="box">
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
                                        Tên khách hàng
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder=""
                                       
                                        value="{{$user->name}}"
                                    />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-right">
                                        Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control"
                                        placeholder=""
                                        value="{{$user->email}}"
                                    />
                                    
                                </div>
                            </div>
                        </div>

                        
                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        CCCD
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="identification"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$user->identification}}"
                                    />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Địa chỉ
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="address"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$user->address}}"
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb15 mb15" type="submit"name="send"value="">Xóa khách hàng</button>
        <a class="btn btn-danger mb15" href="{{route('user.index')}}" name="exit"value="">Hủy bỏ</a>
    </div>
</form>