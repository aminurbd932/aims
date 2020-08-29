@if($applicant)
	<table class="table table-bordered">
		<thead>
			<tr class="default">
				<th>Admisison Offer Name</th>
				<td>{{ $applicant->admissionOffer->name }}</td>
			</tr>
			<tr class="success">
				<th>Serial</th>
				<td>{{ $applicant->serial }}</td>
			</tr>
			<tr class="danger">
				<th>Applicant Name</th>
				<td>{{ $applicant->full_name }}</td>
			</tr>
			<tr class="primary">
				<th>Applicant Code</th>
				<td>{{ $applicant->applicant_code }}</td>
			</tr>
			<tr class="warning">
				<th>Status</th>
				<td>
					<div class="status_label">
					  @if($applicant->assign_status == 1)
					  	<span class="label label-success">Allow</span>
					  @elseif($applicant->assign_status == 2)
					  	<span class="label label-primary">Waiting</span>
					  @elseif($applicant->assign_status == 3)
					  	<span class="label label-warning">Not Allow</span> 
					  @else
					  	<span class="label label-danger">No Selected</span>
					  @endif
					 </div>
				</td>
			</tr>
		</thead>
	</table>
	@if(!$record->isEmpty())
	<table class="table table-bordered">
		<thead>
			<tr class="info">
				<td>#</td>
				<td>Subject Name</td>
				<td>Subject Mark</td>
			</tr>
		</thead>
		<tbody>
				@php $total_mark = 0; @endphp
			@if($record)
				@foreach($record as $key => $row)
				 @php $total_mark += $row->result_mark; @endphp
				<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					<td>{{ $key + 1 }}</td>
					<td>{{ $row->admissionSubjects[$key]->name or '' }}</td>
					<td>{{ $row->result_mark }}</td>
				</tr>
				@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="text-right"><strong>Total</strong></td>
				<td>{{ $total_mark }}</td>
			</tr>
		</tfoot>
	</table>
	@endif
@endif