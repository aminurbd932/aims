<?php 
	$can_view = Entrust::can('admission-offer-view');
	$can_edit = Entrust::can('admission-offer-edit');
	$can_status = Entrust::can('admission-offer-status');
	$can_delete = Entrust::can('admission-offer-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Admission Offer Name</th>
					  <th>Session Name</th>
					  <th>Program Name</th>
					  <th>Group Name</th>
					  <th>Medium</th>
					  <th>Shift</th>
					  <th>Seat Number</th>
					  <th>Is Exam?</th>
					  <th>Status</th>
					  @if($can_view || $can_edit || $can_status || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->name }}</td>
					  <td>{{ $row->session->name}}</td>
					  <td>{{ $row->program->name}}</td>
					  <td>{{ $row->group->name}}</td>
					  <td>{{ $row->medium->name}}</td>
					  <td>{{ $row->shift->name}}</td>
					  <td>{{ $row->seat_number }}</td>
					  <td>
					  	  <div>
						  @if($row->is_exam == 1)
						  	<span class="label label-success">Yes</span>
						  @else
						  	<span class="label label-warning">No</span>
						  @endif
						  </div>
					  </td>
					  <td>
					  	  <div class="status_label">
						  @if($row->status == 1)
						  	<span class="label label-success">Active</span>
						  @else
						  	<span class="label label-warning">Inactive</span>
						  @endif
						  </div>
					  </td>
					  @if($can_view || $can_edit || $can_status || $can_delete)
	                   <td style="text-align: center;width: 120px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn', 'title' => 'Admision Offer View', 'data-href' => '/admin/view-admission-offer/'.$row->id ]) !!}
	                   @endif
	                   @if($can_status)
	                   <span class="status">
	                   @if($row->status == 1)
	                   	{!! Form::button('<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>' ,['class' => 'btn btn-success btn-xs data-inactive-btn','data-href' => '/admin/inactive-admission-offer/'.$row->id ]) !!}
	                   @else
	                   	{!! Form::button('<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-active-btn','data-href' => '/admin/active-admission-offer/'.$row->id ]) !!}
	                   @endif
	                   </span>
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-admission-offer/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-admission-offer/'.$row->id ]) !!}
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