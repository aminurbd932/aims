<?php 
	$can_view = Entrust::can('teacher-teacher-view');
	$can_edit = Entrust::can('teacher-teacher-edit');
	$can_delete = Entrust::can('teacher-teacher-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Teacher Name</th>
					  <th>Teacher Id</th>
					  <th>Teacher Phone</th>
					 	@if($can_view || $can_edit || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->full_name }}</td>
					  <td>{{ $row->teacher_code }}</td>
					  <td>{{ $row->phone }}</td>
					  @if($can_view || $can_edit || $can_status || $can_delete)
	                   <td style="text-align: center;width: 120px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-teacher/'.$row->id ]) !!}
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-teacher/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-teacher/'.$row->id ]) !!}
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