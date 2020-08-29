 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.admission.result_mark.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-admission-mark/'.$record[0]->id,'class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-6 col-lg-offset-3">
          <table class="table edit_com_table">
            <thead>
              <tr class="default">
                <th>Admisison Offer Name</th>
                <td>{{ $record[0]->admissionOffer->name }}</td>
              </tr>
              <tr class="danger">
                <th>Applicant Name</th>
                <td>{{ $record[0]->applicant->full_name }}</td>
              </tr>
              <tr class="primary">
                <th>Applicant Code</th>
                <td>{{ $record[0]->applicant->applicant_code }}</td>
              </tr>
              <tr class="info">
                <th>{!! Form::label('admission_subject_id', __('Subject Name').'*', ['class' => 'control-label required']) !!}</th>
                <th>{!! Form::label('subject_mark', __('Mark').'*', ['class' => 'control-label required']) !!}</th>
              </tr>
            </thead>
            <tbody>
              @php $total_mark = 0; @endphp
              @if (!$record->isEmpty())
              @foreach($record as $key => $row)
              @php $total_mark += $row->result_mark; @endphp
              @php $exam_mark = isset($exam_sub_mark[$row->admission_subject_id]) ? $exam_sub_mark[$row->admission_subject_id] : 0; @endphp
              <tr>
                <td>
                  {{ $row->admissionSubjects[$key]->name or '' }} ({{ $exam_sub_mark[$row->admission_subject_id] or 0 }})
                </td>
                <td>
                  {!! Form::text('subject_mark[]', $row->result_mark, ['class' => 'form-control input-sm input-mark decimal','subject_mark' => $exam_mark, 'maxlength' => '6','required' => 'required']) !!}
                  {!! Form::hidden('subject_id[]', $row->admission_subject_id, ['class' => 'form-control input-sm']) !!}
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
            <tfoot>
              <th>Total</th>
              <th>{!! Form::text('sub_total_mark', $total_mark, ['class' => 'form-control input-sm total-mark', 'readonly' => 'readonly']) !!}</th>
            </tfoot>
          </table>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center save_top">
        <div class="form-group">
          {!! Form::button(__('Update'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm save-btn']) !!}
          {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
        </div>
      </div>
    {{ Form::close() }}
    </div>
    </div>
    </div>
  </section>
  @endsection
