<?php 
	$can_view = Entrust::can('applicant-result-view');
	$can_edit = Entrust::can('applicant-result-edit');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Admission Offer Name</th>
					  <th>Serial</th>
					  <th>Applicant Name</th>
					  <th>Applicant Code</th>
					  <th>Total Mark</th>
					  <th>Status</th>
					  @if($can_view || $can_edit || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->admissionOffer->name }}</td>
					  <td>{{ $row->serial }}</td>
					  <td>{{ $row->full_name }}</td>
					  <td>{{ $row->applicant_code }}</td>
					  <td>
					  	@if($row->type == 1)
					  		<span class="label label-danger">Not Applicable</span>
					  	@else
					  		{{ $row->total_mark }}
					  	@endif
					  </td>
					  <td>
					  	 <div class="status_label">
						  @if($row->status == 1)
						  	<span class="label label-success">Allow</span>
						  @elseif($row->status == 2)
						  	<span class="label label-primary">Waiting</span>
						  @elseif($row->status == 3)
						  	<span class="label label-warning">Not Allow</span> 
						  @else
						  	<span class="label label-danger">No Selected</span>
						  @endif
						  </div>
					  </td>
					  @if($can_view || $can_edit)
	                   <td style="text-align: center;width: 120px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-applicant-result/'.$row->applicant_id ]) !!}
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-applicant-result/'.$row->applicant_id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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