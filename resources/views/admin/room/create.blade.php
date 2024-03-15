@include('admin.room.component.breadcrumb',['title'=>$config['seo']['create']['title']])

<form action="{{route('room.store')}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">
                        Thông tin phòng
                    </div>
                    <div class="panel-description">
                        <p>Nhập thông tin phòng</p>
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
                                       
                                        value="{{old('nameRoom')}}"
                                    />
                                    @if ($errors->has('nameRoom'))
                                        <span class="error-message">
                                            *{{$errors->first('nameRoom')}}
                                        </span>
                                    @endif
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
                                        value="{{old('description')}}"
                                    />
                                    @if ($errors->has('description'))
                                        <span class="error-message">
                                            *{{$errors->first('description')}}
                                        </span>
                                    @endif
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
                                        value="{{old('price')}}"
                                    />

                                    @if ($errors->has('price'))
                                        <span class="error-message">
                                            *{{$errors->first('price')}}
                                        </span>
                                    @endif
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
                                        value="Còn trống"
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

    <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery-3.7.1.min.js')}}"></script>
</form>


