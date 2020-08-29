<?php 
	$can_view = Entrust::can('admission-result_mark-view');
	$can_edit = Entrust::can('admission-result_mark-edit');
	$can_delete = Entrust::can('admission-result_mark-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Admission Offer Name</th>
					  <th>Applicant Name</th>
					  <th>Applicant Code</th>
					  <th>Total Mark</th>
					  @if($can_view || $can_edit || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->admissionOffer->name }}</td>
					  <td>{{ $row->applicant->full_name }}</td>
					  <td>{{ $row->applicant->applicant_code }}</td>
					  <td>{{ $row->total_mark }}</td>
					  @if($can_view || $can_edit || $can_delete)
	                   <td style="text-align: center;width: 120px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-admission-mark/'.$row->id ]) !!}
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-admission-mark/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-admission-mark/'.$row->id ]) !!}
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