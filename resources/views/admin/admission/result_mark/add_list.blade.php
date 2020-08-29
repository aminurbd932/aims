@if(!$exam_list->isEmpty())
<div class="col-md-12">
        <div class="table-responsive">
          {{ Form::open(array('url' => '/admin/save-admission-mark','class' => 'nform-horizontal index_form save_form', 'autocomplete' => 'off')) }}
        <table class="table table-bordered com_table">
          <thead>
            <tr class="info">
              <th rowspan="2">#</th>
              <th rowspan="2">{!! Form::checkbox(null, null, false, ['class' => 'check-all']) !!}</th>
              <th rowspan="2">Applicant Name</th>
              <th rowspan="2">Applicant Code</th>
              <th colspan="{{ $sub_row }}">Subjects Name</th>
              <th rowspan="2" width="12%">ST. Mark</th>
            </tr>
            <tr class="info">
              @if(!$exam_list->isEmpty())
              {!! Form::hidden('admission_offer_id', $exam_list[0]->admission_offer_id, ['class' => 'form-control input-sm']) !!}
                @foreach ($exam_list as $key => $exam_row)
                  <td width="12%">{{ $exam_row->subject_name }}({{ $exam_row->subject_mark }})</td>
                @endforeach
              @endif
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $key => $row)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{!! Form::checkbox(null) !!}</td>
              <td>
                {{ trim($row->full_name) }}
                {!! Form::hidden('applicant_id[]', $row->id, ['class' => 'form-control input-sm']) !!}
              </td>
              <td>{{ $row->applicant_code }}</td>
              @if(!$exam_list->isEmpty())
                  @foreach ($exam_list as $key => $exam_row)
                    <td>
                      {!! Form::text('subject_mark[]', null, ['class' => 'form-control input-sm input-mark decimal', 'maxlength' => '6','subject_mark' => $exam_row->subject_mark, 'required' => 'required']) !!}
                      {!! Form::hidden('subject_id[]', $exam_row->admission_subject_id, ['class' => 'form-control input-sm']) !!}
                    </td>
                  @endforeach
                @endif
              <td>
                {!! Form::text('sub_total_mark[]', null, ['class' => 'form-control input-sm total-mark', 'readonly' => 'readonly']) !!}
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
    @endif