 <table class="table table-bordered">
 	<thead>
	    <tr>
	      <th style="width: 55px;">{!! Form::checkbox(null, null, false, ['class' => 'check-all pull-left',]) !!}&nbsp;#</th>
	      <th style="width: 120px;">Subject Type</th>
	      <th>Subject Name</th>
	      <th>Class Teacher Name</th>
	    </tr>
	 </thead>
	 <tbody>
	 	@foreach ($records as $key => $row)
	 	<tr>
	 		<td>{!! Form::checkbox('subject_offer_id[]', $row->id) !!}&nbsp;{{ $key+1 }}</td>
	 		<td>
	 			{!!Form::select('subject_type[]', subjectType(), null, ['class' => 'form-control', 'required' => 'required'])!!}
	 		</td>
	 		<td>{{ $row->subject->name."(".$row->subject->code.")" }}</td>
	 		<td>{{ $row->teacher->full_name}}</td>
	 	</tr>
	 	@endforeach
	 </tbody>
 </table>
