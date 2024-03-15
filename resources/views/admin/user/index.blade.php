@include('admin.user.component.breadcrumb',['title'=>$config['seo']['index']['title']])
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$config['seo']['index']['tableHeading']}}</h5>
               
            </div>
            <div class="ibox-content">
                @include('admin.user.component.filter')
                @include('admin.user.component.table')
                @include('admin.user.component.paginating')
            </div>
        </div>
    </div>
</div>