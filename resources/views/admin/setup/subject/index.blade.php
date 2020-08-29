@extends('../admin/admin-app')
@section('admin-content')
@include('admin.setup.subject.breadcrumb')
	<section class="content custom-content">
		@include('admin.message')
		@permission('setup-subject-create')
	 <div class="box-header with-border">
	    <h3 class="box-title">
	          <a href="{{url('/admin/add-subject')}}" class="btn bg-navy btn-flat"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;New Add</a>
	    </h3>
	 </div>
	 @endpermission
	<div class="row list-container" id="search_result">
		@include('admin.setup.subject.list')
	</div>
	</section>
@endsection