@extends('../admin/admin-app')
@section('admin-content')
@include('admin.teacher.teacher.breadcrumb')
	<section class="content custom-content">
		@include('admin.message')
		@permission('teacher-teacher-create')
	 <div class="box-header with-border">
	    <h3 class="box-title">
	          <a href="{{url('/admin/add-teacher')}}" class="btn bg-navy btn-flat"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;New Add</a>
	    </h3>
	 </div>
	 @endpermission
	<div class="row list-container" id="search_result">
		@include('admin.teacher.teacher.list')
	</div>
	</section>
@endsection