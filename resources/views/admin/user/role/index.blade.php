@extends('../admin/admin-app')
@section('admin-content')
@include('admin.user.role.breadcrumb')
	<section class="content custom-content">
		@include('admin.message')
	 <div class="box-header with-border">
	    <h3 class="box-title">
	          <a href="{{url('/admin/add-role')}}" class="btn bg-navy btn-flat"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;New Add</a>
	    </h3>
	 </div>
	<div class="row list-container" id="search_result">
		@include('admin.user.role.list')
	</div>
	</section>
@endsection