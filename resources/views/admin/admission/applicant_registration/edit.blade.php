 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.admission.admission_exam.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-admission-exam/'.$applicant->id,'class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group {{ $errors->has('admission_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('admission_offer_id', __('Admission Offer Name').'*', ['class' => 'control-label required']) !!} 
          @if ($admission_offer_list)
              {!!Form::select('admission_offer_id', $admission_offer_list->pluck('name','id'), $record->admission_offer_id, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors->first('admission_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('exam_date') ? ' has-error' : '' }}">
          {!! Form::label('exam_date', __('Exam Date').'*', ['class' => 'control-label required']) !!}  
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
                  {!! Form::text('exam_date', custom_date_format($record->exam_date, 'd/m/Y'), ['class' => 'form-control pull-right input-sm', 'id' => 'datepicker', 'required' => 'required']) !!}
          </div>
          
         <span class="help-block">{{ $errors -> first('exam_date') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('exam_start_time') ? ' has-error' : '' }}">
          {!! Form::label('exam_start_time', __('Exam Start Time').'*', ['class' => 'control-label required']) !!}  
          <div class="input-group">
            {!! Form::text('exam_start_time', $record->exam_start_time, ['class' => 'form-control input-sm timepicker','required' => 'required']) !!}
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
          </div>
         <span class="help-block">{{ $errors -> first('exam_start_time') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('exam_end_time') ? ' has-error' : '' }}">
          {!! Form::label('exam_end_time', __('Exam End Time').'*', ['class' => 'control-label required']) !!} 
          <div class="input-group">
            {!! Form::text('exam_end_time', $record->exam_end_time, ['class' => 'form-control input-sm timepicker', 'required' => 'required']) !!}
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
          </div> 
         <span class="help-block">{{ $errors -> first('exam_end_time') }}</span>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-6 col-lg-offset-3">
          <table class="table subject_table">
            <thead>
              <tr class="info">
                <th>{!! Form::label('admission_subject_id', __('Subject Name').'*', ['class' => 'control-label required']) !!}</th>
                <th>{!! Form::label('subject_mark', __('Mark').'*', ['class' => 'control-label required']) !!}</th>
                <th>--</th>
              </tr>
            </thead>
            <tbody>
              @if ($exam_subj_list)
              @foreach($exam_subj_list as $key => $subj)
              <tr>
                <td>
                  @if ($admission_subject_list)
                    {!!Form::select('admission_subject_id[]', $admission_subject_list->pluck('name','id'), $subj->id, ['class' => 'form-control admission_subject_id', 'required' => 'required'])!!}
                  @endif
                  <input type="hidden" value="{{ $subj->id }}" class="check">
                </td>
                <td>
                  {!! Form::text('subject_mark[]', $subj->subject_mark, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-sm add"><i class="fa fa-plus"></i></button>
                    <button type="button" {{{ ($key) ? '' : 'disabled' }}} class="btn btn-danger btn-sm remove"><i class="fa fa-remove"></i></button>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
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
