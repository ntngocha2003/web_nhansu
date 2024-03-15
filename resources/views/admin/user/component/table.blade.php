<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
        </th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>CCCD</th>
        <th>Địa chỉ</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
        @if(@isset($users) && is_object($users))
            @foreach ($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="" id="checkAll" class="input-checkbox"/>
                    </td>

                    <td>
                        {{$user->name}}
                    </td>
            
                    <td>
                        {{$user->email}}
                    </td>
            
                    <td>
                        {{$user->phone}}
                    </td>
            
                    <td>
                        {{$user->identification}}
                    </td>

                    <td>
                        {{$user->address}}
                    </td>
                   
                    <td class="text-center">                 
                        <a href="{{route('user.delete', ['user' => $user->userId, 'pageIndex' => $pageIndex])}}" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                    </td>
                </tr>         
            @endforeach
        @endif

    </tbody>
</table>

