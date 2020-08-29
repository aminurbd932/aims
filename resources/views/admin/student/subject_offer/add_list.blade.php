@if(!$records->isEmpty())
<div class="col-md-12">
        <div class="table-responsive">
          {{ Form::open(array('url' => '/admin/save-subject-offer','class' => 'nform-horizontal index_form save_form', 'autocomplete' => 'off')) }}
        <table class="table table-bordered com_table">
          <thead>
            <tr class="info">
              <th>#</th>
              <th>{!! Form::checkbox(null, null, false, ['class' => 'check-all']) !!}</th>
              <th>Subject Name{!! Form::hidden('program_offer_id', $program_offer_id, ['class' => 'form-control input-sm']) !!}</th>
              <th>Teacher Name</th>
              <th style="width: 100px;">Total Mark</th>
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $key => $row)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{!! Form::checkbox(null) !!}</td>
              <td>
                {{ $row->name."(".$row->code.")" }}
                {!! Form::hidden('subject_id[]', $row->id, ['class' => 'form-control input-sm']) !!}
              </td>
              <td>
                @if ($teacher_list)
                  {!!Form::select('teacher_id[]', $teacher_list->pluck('full_name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
                @endif
              </td>
              <td>
                {!! Form::text('subject_mark[]', null, ['class' => 'form-control input-sm decimal', 'required' => 'required']) !!}
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
         <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
            <div class="form-group">
              {!! Form::button(__('Remove'), ['class' => 'btn btn-info btn-sm all-remove-btn']) !!}
              {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm save-btn']) !!}
              {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
            </div>
          </div>
      </div>
    </div>

    <script type="text/javascript">
      $(".nform-horizontal").validator();
    </script>
@endif