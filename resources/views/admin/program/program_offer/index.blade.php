@extends('../admin/admin-app')
@section('admin-content')
@include('admin.program.program_offer.breadcrumb')
	<section class="content custom-content">
		@include('admin.message')
		@permission('program-offer-create')
	 <div class="box-header with-border">
	    <h3 class="box-title">
	          <a href="{{url('/admin/add-program-offer')}}" class="btn bg-navy btn-flat"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;New Add</a>
	    </h3>
	 </div>
	 @endpermission
	<div class="row list-container" id="search_result">
		@include('admin.program.program_offer.list')
	</div>
	</section>
@endsection