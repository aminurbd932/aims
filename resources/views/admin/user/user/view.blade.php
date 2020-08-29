<table class="table table-bordered">
	<thead>
		<tr>
			<th>Permission Name</th>
			<td>{{ $record->name }}</td>
		</tr>
		<tr>
			<th>Display Name</th>
			<td>{{ $record->display_name }}</td>
		</tr>
		<tr>
			<th>Description</th>
			<td>{{ $record->description }}</td>
		</tr>
		<tr>
			<th>Role Name</th>
			<td>
				@if($role_name)
					@foreach ($role_name as $key => $row)
						&nbsp;<span class="label label-{{ (($key +1) % 2) == 0 ? 'success' : 'primary' }}">{{ $row->name." " }}</span>&nbsp;
					@endforeach
				@endif
			</td>
		</tr>
	</thead>
</table>