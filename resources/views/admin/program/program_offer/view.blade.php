<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Program Offer Name</th>
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
			<th>Section Name</th>
			<td>{{ $record->section->name }}</td>
		</tr>
		<tr class="warning">
			<th>Group Name</th>
			<td>{{ $record->group->name }}</td>
		</tr>
		<tr class="danger">
			<th>Medium Name</th>
			<td>{{ $record->medium->name }}</td>
		</tr>
		<tr class="primary">
			<th>Shift Name</th>
			<td>{{ $record->shift->name }}</td>
		</tr>
		<tr class="success">
			<th>Seat Number</th>
			<td>{{ $record->seat_number }}</td>
		</tr>
		<tr class="default">
			<th>Class Teacher Name</th>
			<td>{{ $record->teacher->full_name }}</td>
		</tr>
		<tr class="danger">
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