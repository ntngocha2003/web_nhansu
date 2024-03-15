<!-- paginating  -->
@if($numberOfPage > 1)
    <div class="d-flex justify-content-center align-items-center my-2">
         <a class="btn btn-success" href="{{route('order.index', ['pageIndex' => $pageIndex - 1])}}">Trước</a>  
         @for($i = 1; $i <= $numberOfPage; $i++)
            @if($pageIndex == $i)
                <a class="btn btn-primary ms-2" href="{{route('order.index', ['pageIndex' => $i])}}">{{$i}}</a> 
            @else
                
                @if($i == 1 || $i == $numberOfPage || ($i <= $pageIndex + 4 && $i >= $pageIndex - 4))
                    <a class="btn btn-success ms-2" href="{{route('order.index', ['pageIndex' => $i])}}">{{$i}}</a>
                @elseif($i == $pageIndex - 5 || $i == $pageIndex + 5)
                    <a class="btn btn-success ms-2" href="{{route('order.index', ['pageIndex' => $i])}}">...</a>
                @endif
            @endif
         @endfor
         <a class="btn btn-success ms-2" href="{{route('order.index', ['pageIndex' => $pageIndex + 1])}}">Sau</a>
    </div>
    @endif