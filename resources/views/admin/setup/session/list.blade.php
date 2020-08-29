<?php 
	$can_edit = Entrust::can('setup-session-edit');
	$can_status = Entrust::can('setup-session-status');
	$can_delete = Entrust::can('setup-session-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Session Name</th>
					  <th>Is Current</th>
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
						  @if($row->is_current == 1)
						  	<span class="label label-success">Yes</span>
						  @else
						  	<span class="label label-warning">No</span>
						  @endif
						  </div>
					  </td>
					  @if($can_edit || $can_status || $can_delete)
	                   <td style="text-align: center;width: 100px;">
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-session/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete && $row->is_current == 2)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-session/'.$row->id ]) !!}
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