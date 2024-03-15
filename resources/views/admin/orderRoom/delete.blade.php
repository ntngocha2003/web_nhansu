@include('admin.orderRoom.component.breadcrumb',['title'=>$config['seo']['delete']['title']])

<form action="{{route('order.destroy', ['order' => $order->orderId, 'pageIndex' => $pageIndex])}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">
                        Thông tin phòng đặt cần xóa
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
                                       
                                        value="{{$order->getNameUser()}}"
                                    />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-right">
                                        Tên phòng đặt
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="nameRoom"
                                        class="form-control"
                                        placeholder=""
                                        value="{{$order->getNameRoom()}}"
                                    />
                                    
                                </div>
                            </div>
                        </div>

                        
                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Tình trạng
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="status"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$order->status}}"
                                    />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label class="control-label text-left">
                                        Tổng tiền
                                        <span class="text-danger"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="totalMoney"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        value="{{$order->totalMoney}}"
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb15 mb15" type="submit"name="send"value="">Xóa đơn đặt phòng</button>
        <a class="btn btn-danger mb15" href="{{route('order.index')}}" name="exit"value="">Hủy bỏ</a>
    </div>
</form>