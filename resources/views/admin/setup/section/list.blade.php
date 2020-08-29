<?php 
	$can_edit = Entrust::can('setup-section-edit');
	$can_status = Entrust::can('setup-section-status');
	$can_delete = Entrust::can('setup-section-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Section Name</th>
					  <th>Status</th>
					  @if($can_edit || $can_status || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->name }}</td>
					  <td>
					  	  <div class="status_label">
						  @if($row->status == 1)
						  	<span class="label label-success">Active</span>
						  @else
						  	<span class="label label-warning">Inactive</span>
						  @endif
						  </div>
					  </td>
					  @if($can_edit || $can_status || $can_delete)
	                   <td style="text-align: center;width: 100px;">
	                   @if($can_status)
	                   <span class="status">
	                   @if($row->status == 1)
	                   	{!! Form::button('<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>' ,['class' => 'btn btn-success btn-xs data-inactive-btn','data-href' => '/admin/inactive-section/'.$row->id ]) !!}
	                   @else
	                   	{!! Form::button('<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-active-btn','data-href' => '/admin/active-section/'.$row->id ]) !!}
	                   @endif
	                   </span>
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-section/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-section/'.$row->id ]) !!}
	                   @endif
	                   </td>
	                   @endif
					</tr>
				 	@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>