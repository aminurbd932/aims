 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.admission.applicant_registration.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-applicant-registration','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Apply For(2018-2019)
        </h2>
      </div>
   		<div class="col-xs-6 col-sm-6 col-md-12 col-lg-6 col-lg-offset-3">
        <div class="form-group {{ $errors->has('admission_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('admission_offer_id', __('Admission Offer Name').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('admission_offer_id', $admission_offer_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('admission_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Personal Information
        </h2>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('full_name') ? ' has-error' : '' }}">
          {!! Form::label('full_name', __('Full Name').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('full_name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('full_name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
          {!! Form::label('dob', __('Date Of Birth').'*', ['class' => 'control-label required']) !!}  
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
                  {!! Form::text('dob', null, ['class' => 'form-control pull-right input-sm', 'id' => 'datepicker', 'required' => 'required']) !!}
          </div>
          
         <span class="help-block">{{ $errors -> first('dob') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('birth_reg_no') ? ' has-error' : '' }}">
          {!! Form::label('birth_reg_no', __('Birth Reg. No').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('birth_reg_no', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('birth_reg_no') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('religion_id') ? ' has-error' : '' }}">
          {!! Form::label('religion_id', __('Religion').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('religion_id', religion(1), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('religion_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('sex') ? ' has-error' : '' }}">
          {!! Form::label('sex', __('Gender').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('sex', gender(1), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('sex') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('national_id_no') ? ' has-error' : '' }}">
          {!! Form::label('national_id_no', __('National Id No'), ['class' => 'control-label']) !!}  
          {!! Form::text('national_id_no', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('national_id_no') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('blood_group_id') ? ' has-error' : '' }}">
          {!! Form::label('blood_group_id', __('Blood Group'), ['class' => 'control-label']) !!} 
          {!!Form::select('blood_group_id', bloodGroup(1), null, ['class' => 'form-control'])!!}
         <span class="help-block">{{ $errors->first('blood_group_id') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Contact Number
        </h2>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-lg-offset-3">
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
          {!! Form::label('phone', __('Phone'), ['class' => 'control-label']) !!}  
          {!! Form::text('phone', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::label('email', __('Email'), ['class' => 'control-label']) !!}  
          {!! Form::text('email', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('email') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Present Address Information
        </h2>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('present_thana_id') ? ' has-error' : '' }}">
          {!! Form::label('present_thana_id', __('Thana/Upazila').'*', ['class' => 'control-label required']) !!}
          {!!Form::select('present_thana_id', $thana_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('present_thana_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('present_post_code') ? ' has-error' : '' }}">
          {!! Form::label('present_post_code', __('Post Code').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('present_post_code', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('present_post_code') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group {{ $errors->has('present_address') ? ' has-error' : '' }}">
          {!! Form::label('present_address', __('Address').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('present_address', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('present_address') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Permanent Address Information&nbsp;(<input type="checkbox" class="same_permanent_address">)
        </h2>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('permanent_thana_id') ? ' has-error' : '' }}">
          {!! Form::label('permanent_thana_id', __('Thana/Upazila'), ['class' => 'control-label']) !!} 
          {!!Form::select('permanent_thana_id', $thana_list->pluck('name','id'), null, ['class' => 'form-control'])!!}
         <span class="help-block">{{ $errors->first('permanent_thana_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('permanent_post_code') ? ' has-error' : '' }}">
          {!! Form::label('permanent_post_code', __('Post Code'), ['class' => 'control-label']) !!}  
          {!! Form::text('permanent_post_code', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('permanent_post_code') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group {{ $errors->has('permanent_address') ? ' has-error' : '' }}">
          {!! Form::label('permanent_address', __('Address'), ['class' => 'control-label']) !!}  
          {!! Form::text('permanent_address', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('permanent_address') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Parents/Legal Guardian Information
        </h2>
      </div>
                  <!--         Father Info          -->
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('father_name') ? ' has-error' : '' }}">
          {!! Form::label('father_name', __('Father Name').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('father_name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('father_name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('father_phone') ? ' has-error' : '' }}">
          {!! Form::label('father_phone', __('Phone(F)'), ['class' => 'control-label']) !!}  
          {!! Form::text('father_phone', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('father_phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('father_national_id') ? ' has-error' : '' }}">
          {!! Form::label('father_national_id', __('National Id No(F)').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('father_national_id', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('father_national_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('father_profession') ? ' has-error' : '' }}">
          {!! Form::label('father_profession', __('Profession(F)').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('father_profession', profession(1), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('father_profession') }}</span>
        </div>
      </div>
              <!--         Mother Info          -->
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('mother_name') ? ' has-error' : '' }}">
          {!! Form::label('mother_name', __('Mother Name').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('mother_name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('mother_name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('mother_phone') ? ' has-error' : '' }}">
          {!! Form::label('mother_phone', __('Phone(M)'), ['class' => 'control-label']) !!}  
          {!! Form::text('mother_phone', null, ['class' => 'form-control input-sm']) !!}
         <span class="help-block">{{ $errors -> first('mother_phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('mother_national_id') ? ' has-error' : '' }}">
          {!! Form::label('mother_national_id', __('National Id No(M)').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('mother_national_id', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('mother_national_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('mother_profession') ? ' has-error' : '' }}">
          {!! Form::label('mother_profession  ', __('Profession(M)').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('mother_profession', profession(1), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('mother_profession') }}</span>
        </div>
      </div>
                  <!--         Guardian Info          -->
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('guardian_name') ? ' has-error' : '' }}">
          {!! Form::label('guardian_name', __('Guardian Name').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('guardian_name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('guardian_name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('guardian_phone') ? ' has-error' : '' }}">
          {!! Form::label('guardian_phone', __('Phone(G)').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('guardian_phone', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('guardian_phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('guardian_national_id') ? ' has-error' : '' }}">
          {!! Form::label('guardian_national_id', __('National Id No(G)').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('guardian_national_id', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('guardian_national_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('guardian_profession') ? ' has-error' : '' }}">
          {!! Form::label('guardian_profession', __('Profession(G)').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('guardian_profession', profession(1), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors->first('guardian_profession') }}</span>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Previous Qualification Information
        </h2>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
          <table class="table subject_table">
            <thead>
              <tr class="info">
                <th>{!! Form::label('exam_id', __('Ex. Name'), ['class' => 'control-label']) !!}</th>
                <th>{!! Form::label('roll_no', __('Roll No'), ['class' => 'control-label']) !!}</th>
                <th>{!! Form::label('reg_no', __('Thana/Reg. No'), ['class' => 'control-label']) !!}</th>
                <th>{!! Form::label('board_id', __('Board'), ['class' => 'control-label']) !!}</th>
                <th style="width:85px;">{!! Form::label('gpa', __('GPA'), ['class' => 'control-label']) !!}</th>
                <th style="width:85px;">{!! Form::label('total_mark', __('T. Mark'), ['class' => 'control-label']) !!}</th>
                <th>{!! Form::label('passing_year', __('Passing Year'), ['class' => 'control-label']) !!}</th>
                <th style="width:85px;">--</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                    {!!Form::select('exam_id[]', examination(1), null, ['class' => 'form-control exam_id'])!!}
                  <input type="hidden" class="check">
                </td>
                <td>
                  {!! Form::text('roll_no[]', null, ['class' => 'form-control input-sm']) !!}
                </td>
                <td>
                  {!! Form::text('reg_no[]', null, ['class' => 'form-control input-sm']) !!}
                </td>
                <td>
                    {!!Form::select('board_id[]', $board_list->pluck('name','id'), null, ['class' => 'form-control board_id'])!!}
                </td>
                <td>
                  {!! Form::text('gpa[]', null, ['class' => 'form-control input-sm']) !!}
                </td>
                <td>
                  {!! Form::text('total_mark[]', null, ['class' => 'form-control input-sm']) !!}
                </td>
                <td>
                    {!!Form::select('passing_year[]', qualificationYear(1), null, ['class' => 'form-control passing_year'])!!}
                  <input type="hidden" class="check">
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-sm add"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger btn-sm remove"><i class="fa fa-remove"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2 class="page-header">
            Applicant Photo
        </h2>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
   			<div class="form-group">
     		  {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm save-btn']) !!}
     		  {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
        </div>
      </div>
   	{{ Form::close() }}
    </div>
    </div>
   	</div>
  </section>
  @endsection
