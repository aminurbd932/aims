<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Admisison Offer Name</th>
			<td>{{ $record->admissionOffer->name }}</td>
		</tr>
		<tr class="danger">
			<th>Exam Date</th>
			<td>{{ $record->exam_date }}</td>
		</tr>
		<tr class="primary">
			<th>Start Exam Time</th>
			<td>{{ custom_time_format($record->exam_start_time, ' H:i A') }}</td>
		</tr>
		<tr class="success">
			<th>End Exam Time</th>
			<td>{{ custom_time_format($record->exam_end_time, ' H:i A') }}</td>
		</tr>
		<tr class="default">
			<th>Status</th>
			<td>
				@if($record->status == 1)
				  <span class="label label-success">Active</span>
				@else
				  <span class="label label-warning">Inactive</span>
				@endif
			</td>
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
		@if(!$exam_subj_list->isEmpty())
			@php $total_mark = 0; @endphp
			@foreach($exam_subj_list as $key => $row)
			 @php $total_mark += $row->subject_mark; @endphp
			<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
				<td>{{ $key + 1 }}</td>
				<td>{{ $row->name }}</td>
				<td>{{ $row->subject_mark }}</td>
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