@extends('../admin/admin-app')
@section('admin-content')
@include('admin.setup.medium.breadcrumb')
<section class="content custom-content">
    @include('admin.message')
    @permission('setup-medium-create')
    <div class="box-header with-border">
        <h3 class="box-title">
            <a href="{{url('/admin/add-medium')}}" class="btn bg-navy btn-flat"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;New Add</a>
        </h3>
    </div>
    @endpermission
    <div class="row list-container" id="search_result">
        @include('admin.setup.medium.list')
    </div>
</section>
@endsection