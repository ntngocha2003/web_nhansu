<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
        </th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Tên phòng đặt</th>
        <th>Ngày nhận phòng</th>
        <th>Ngày trả phòng</th>
        <th>Số ngày ở</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
        @if(@isset($orders) && is_object($orders))
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
                    </td>

                    <td>
                        {{$order->getNameUser()}}
                    </td>
            
                    <td>
                        {{$order->getPhoneUser()}}
                    </td>
            
                    <td>
                        {{$order->getNameRoom()}}
                    </td>
            
                    <td>
                        {{$order->checkIn}}
                    </td>

                    <td>
                        {{$order->checkOut}}
                    </td>

                    <td>
                        {{$order->numberOfDay}}
                    </td>

                    <td>
                        {{$order->totalMoney}}
                    </td>

                    <td>
                        {{$order->status}}
                    </td>
                   
                    <td class="text-center">  
                        @if ($order->status==='Đang xác thực')                     
                            <form action="{{route('order.updateConfirm', ['order' => $order->orderId, 'pageIndex' => $pageIndex])}}" method="post" class="btn btn-susess">
                                @csrf
                               <button type="submit">Xác nhận</button>
                            </form>               
                        @endif
                        <a href="{{route('order.delete', ['order' => $order->orderId, 'pageIndex' => $pageIndex])}}" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                    </td>
                </tr>         
            @endforeach
        @endif

    </tbody>
</table>

