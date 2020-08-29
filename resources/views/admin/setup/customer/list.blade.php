<?php 
	$can_view = Entrust:: can('setup-customer-view');
	$can_edit = Entrust::can('setup-customer-edit');
	$can_delete = Entrust::can('setup-customer-delete');
	$can_status = Entrust::can('setup-customer-status');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Customer Name</th>
					  <th>Company Name</th>
					  <th>Type</th>
					  <th>Mobile</th>
					  <th>Phone</th>
					  <th>Email</th>
					  <th>Status</th>
					  @if($can_view || $can_edit || $can_delete || $can_status)
					  <th>Action</th>
					  @endif
					</tr>
					@if($records)
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->name }}</td>
					  <td>{{ $row->company->name or '' }}</td>
					  <td>
						  @if($row->type == 1)
						  	<span class="label label-info">Normal</span>
						  @else
						  	<span class="label label-primary">Special</span>
						  @endif
					  </td>
					  <td>{{ $row->mobile }}</td>
					  <td>{{ $row->phone }}</td>
					  <td>{{ $row->email }}</td>
					  <td>
					  	  <div class="status_label">
						  @if($row->status == 1)
						  	<span class="label label-success">Active</span>
						  @else
						  	<span class="label label-warning">Inactive</span>
						  @endif
						  </div>
					  </td>
					  @if($can_view || $can_edit || $can_delete || $can_status)
	                   <td style="text-align: center;width: 120px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-customer/'.$row->id ]) !!}
	                   @endif
	                   @if($can_status)
	                   <span class="status">
	                   @if($row->status == 1)
	                   	{!! Form::button('<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>' ,['class' => 'btn btn-success btn-xs data-inactive-btn','data-href' => '/admin/inactive-customer/'.$row->id ]) !!}
	                   @else
	                   	{!! Form::button('<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-active-btn','data-href' => '/admin/active-customer/'.$row->id ]) !!}
	                   @endif
	                   </span>
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-customer/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-customer/'.$row->id ]) !!}
	                   @endif
	                   </td>
	                   @endif
					</tr>
				 	@endforeach
				 	@endif
				</tbody>
			</table>
		</div>
	</div>
</div>