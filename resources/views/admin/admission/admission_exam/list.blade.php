<?php 
	$can_view = Entrust::can('admission-exam-view');
	$can_edit = Entrust::can('admission-exam-edit');
	$can_status = Entrust::can('admission-exam-status');
	$can_delete = Entrust::can('admission-exam-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Admission Offer Name</th>
					  <th>Subjects</th>
					  <th>Exam Date</th>
					  <th>Start Time</th>
					  <th>End Time</th>
					  <th>Status</th>
					  @if($can_view || $can_edit || $can_status || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->admissionOffer->name }}</td>
					  <td>
					  	@foreach($row->admissionSubjects as $subject)
					  	<span class="label label-info">{{$subject->name or ''}}</span>
					  @endforeach
					  </td>
					  <td>{{ $row->exam_date}}</td>
					  <td>{{ custom_time_format($row->exam_start_time, ' h:i A') }}</td>
					  <td>{{ custom_time_format($row->exam_end_time, ' h:i A')}}</td>
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
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-admission-exam/'.$row->id ]) !!}
	                   @endif
	                   @if($can_status)
	                   <span class="status">
	                   @if($row->status == 1)
	                   	{!! Form::button('<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>' ,['class' => 'btn btn-success btn-xs data-inactive-btn','data-href' => '/admin/inactive-admission-exam/'.$row->id ]) !!}
	                   @else
	                   	{!! Form::button('<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-active-btn','data-href' => '/admin/active-admission-exam/'.$row->id ]) !!}
	                   @endif
	                   </span>
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-admission-exam/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-admission-exam/'.$row->id ]) !!}
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