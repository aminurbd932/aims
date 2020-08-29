@if(!$records->isEmpty())
<div class="col-md-12">
        <div class="table-responsive">
          {{ Form::open(array('url' => '/admin/save-applicant-result','class' => 'nform-horizontal index_form save_form', 'autocomplete' => 'off')) }}
        <table class="table table-bordered com_table">
          <thead>
            <tr class="info">
              <th>#</th>
              <th>{!! Form::checkbox(null, null, false, ['class' => 'check-all']) !!}</th>
              <th>Applicant Name</th>
              <th>Applicant Code</th>
              <th>Total Mark</th>
              <th style="width: 100px;">Serial</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $key => $row)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{!! Form::checkbox(null) !!}</td>
              <td>
                {{ trim($row->first_name." ".$row->middle_name." ".$row->last_name) }}
                {!! Form::hidden('applicant_id[]', $row->applicant_id, ['class' => 'form-control input-sm']) !!}
              </td>
              <td>{{ $row->applicant_code }}</td>
              <td>
                @if($row->type == 1)
                  <span class="label label-danger">Not Applicable</span>
                @else
                  {{ $row->total_mark }}
                @endif
              </td>
              <td>
                {!! Form::text('serial[]', $key+1, ['class' => 'form-control input-sm decimal', 'required' => 'required']) !!}
              </td>
              <td>
                @if (resultStatus())
                  {!!Form::select('assign_status[]', resultStatus(1), null, ['class' => 'form-control','required' => 'required'])!!}
                @endif
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