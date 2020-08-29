<table class="table table-bordered">
	<thead>
		<tr class="default">
			<th>Company/Shop Name</th>
			<td>{{ $record->name }}</td>
		</tr>
		<tr class="primary">
			<th>Type</th>
			<td>
				@if($record->type == 1)
				  	<span class="label label-info">Customer</span>
				  @elseif($record->type == 2)
				  	<span class="label label-primary">Supplier</span>
				  @else
				  	<span class="label label-success">Product</span>
				  @endif
			</td>
		</tr>
		<tr class="success">
			<th>Mobile</th>
			<td>{{ $record->mobile }}</td>
		</tr>
		<tr class="info">
			<th>Phone</th>
			<td>{{ $record->phone }}</td>
		</tr>
		<tr class="warning">
			<th>Email</th>
			<td>{{ $record->email }}</td>
		</tr>
		<tr class="danger">
			<th>Addres</th>
			<td>{{ $record->address }}</td>
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