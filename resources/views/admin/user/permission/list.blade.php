<?php 
	$can_view = Entrust::can('user-permission-view');
	$can_edit = Entrust::can('user-permission-edit');
	$can_delete = Entrust::can('user-permission-delete');
?>
<div class="col-md-12">
	<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<tbody>
					<tr class="active">
					  <th>#</th>
					  <th>Permission Name</th>
					  <th>Display Name</th>
					  <th>Description</th>
					  @if($can_view || $can_edit || $can_delete)
					  <th>Action</th>
					  @endif
					</tr>
					@if($records)
					@foreach ($records as $key => $row)
					<tr class="{{ (($key+1) % 2 == 0) ? 'success' : 'primary' }}">
					  <td>{{ $key+1 }}</td>
					  <td>{{ $row->name }}</td>
					  <td>{{ $row->display_name }}</td>
					  <td>{{ $row->description }}</td>
					  @if($can_view || $can_edit || $can_delete)
	                   <td style="text-align: center;width: 100px;">
	                   @if($can_view)
	                   {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i>' ,['class' => 'btn btn-sucess btn-xs data-view-btn','data-href' => '/admin/view-permission/'.$row->id ]) !!}
	                   @endif
	                   @if($can_edit)
	                   <a href="{{url('/admin/edit-permission/'.$row->id)}}" class="btn btn-info btn-xs data-edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	                   @endif
	                   @if($can_delete)
	                   {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' ,['class' => 'btn btn-danger btn-xs data-delete-btn','data-href' => '/admin/delete-permission/'.$row->id ]) !!}
	                   @endif
	                   </td>
	                   @endif
					</tr>
				 	@endforeach
				 	@endif
				</tbody>
			</table>
		</div>
	</div>
</div>