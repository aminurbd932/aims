<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Program Offer Name</th>
			<td>{{ $record->programOffer->name }}</td>
		</tr>
		<tr class="danger">
			<th>Subject Name</th>
			<td>{{ $record->subject->name."(".$record->subject->code.")" }}</td>
		</tr>
		<tr class="primary">
			<th>Teacher Name</th>
			<td>{{ $record->teacher->full_name }}</td>
		</tr>
		<tr class="success">
			<th>Subject Mark</th>
			<td>{{ $record->subject_mark }}</td>
		</tr>
		<tr class="info">
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
		<tr>
			<th>#</th>
			<th>Mark Type</th>
			<th>Mark</th>
			<th>Mark(%)</th>
			<th>Divided Mark</th>
		</tr>
	</thead>
	<tbody>
		@php($total_divided_mark = 0)
		@foreach ($records as $key => $row)
			@php $total_divided_mark += $row->divided_mark @endphp
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $row->markType->name }}</td>
				<td>{{ $row->orginal_mark }}</td>
				<td>{{ $row->percent_mark }}</td>
				<td>{{ $row->divided_mark }}</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4"></th>
			<th>{{ $total_divided_mark }}</th>
		</tr>
	</tfoot>
</table>