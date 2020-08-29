<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Admisison Offer Name</th>
			<td>{{ $record[0]->admissionOffer->name }}</td>
		</tr>
		<tr class="danger">
			<th>Applicant Name</th>
			<td>{{ $record[0]->applicant->full_name }}</td>
		</tr>
		<tr class="primary">
			<th>Applicant Code</th>
			<td>{{ $record[0]->applicant->applicant_code }}</td>
		</tr>
	</thead>
</table>
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
		@if(!$record->isEmpty())
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