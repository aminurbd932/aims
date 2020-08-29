<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Admisison Offer Name</th>
			<td>{{ $record->name }}</td>
		</tr>
		<tr class="danger">
			<th>Session Name</th>
			<td>{{ $record->session->name }}</td>
		</tr>
		<tr class="primary">
			<th>Class Level Name</th>
			<td>{{ $record->classLevel->name }}</td>
		</tr>
		<tr class="success">
			<th>Program/Class Name</th>
			<td>{{ $record->program->name }}</td>
		</tr>
		<tr class="info">
			<th>Group Name</th>
			<td>{{ $record->group->name }}</td>
		</tr>
		<tr class="warning">
			<th>Medium Name</th>
			<td>{{ $record->medium->name }}</td>
		</tr>
		<tr class="danger">
			<th>Shift Name</th>
			<td>{{ $record->shift->name }}</td>
		</tr>
		<tr class="primary">
			<th>Seat Number</th>
			<td>{{ $record->seat_number }}</td>
		</tr>
		<tr class="success">
			<th>Is Exam</th>
			<td>
				@if($record->is_exam == 1)
				  <span class="label label-info">Yes</span>
				@else
				  <span class="label label-danger">No</span>
				@endif
			</td>
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