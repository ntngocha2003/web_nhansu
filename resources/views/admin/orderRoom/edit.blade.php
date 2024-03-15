@include('admin.orderRoom.component.breadcrumb',['title'=>$config['seo']['edit']['title']])

<form action="{{route('order.updateConfirm', ['order' => $order->orderId, 'pageIndex' => $pageIndex])}}" method="post" class="box">
    @csrf
    @method('PUT')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel-head">
                    <div class="panel-title">
                        Trạng thái đặt phòng
                    </div>
                    <div class="panel-description">
                        <p>Cập nhập trạng thái phòng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label class="control-label text-right">
                                        Trạng thái
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="status" class="form-control setupSelect2">
                                            <option></option>
                                    </select>
                                    {{-- <input
                                        type="text"
                                        name="nameRoom"
                                        class="form-control"
                                        placeholder=""
                                       
                                        value="{{$order->nameRoom}}"
                                    /> --}}
                                    
                                </div>
                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb15" type="submit"name="send"value="">Lưu thông tin</button>
        <a class="btn btn-danger mb15" href="{{route('order.index')}}" name="exit"value="">Hủy bỏ</a>
    </div>
</form>