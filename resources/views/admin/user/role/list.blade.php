<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Role Name</th>
					  <th>Display Name</th>
					  <th>Description</th>
					  <th>Action</th>
					</tr>
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->name }}</td>
					  <td>{{ $row->display_name }}</td>
					  <td>{{ $row->description }}</td>
	                   <td style="text-align: center;width: 80px;">
	                   <!-- {!! Form::button('<i class="fa fa-pencil"></i>' ,['class' => 'btn btn-info btn-xs data-edit-btn','data-href' => '/admin/edit-role/'.$row->id ]) !!} -->
	                   <a href="{{url('/admin/edit-role/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/delete-role/'.$row->id ]) !!}
	                   </td>
					</tr>
				 	@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>