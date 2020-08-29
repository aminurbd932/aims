 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.program.program_offer.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-program-offer','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
   		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
  			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Admission Offer Name').'*', ['class' => 'control-label required']) !!}	
          {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('class_level_id') ? ' has-error' : '' }}">
          {!! Form::label('class_level_id', __('Class/Program Level Name').'*', ['class' => 'control-label required']) !!} 
          @if ($class_level_list)
              {!!Form::select('class_level_id', $class_level_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('class_level_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('program_id') ? ' has-error' : '' }}">
          {!! Form::label('program_id', __('Class/Program Name').'*', ['class' => 'control-label required']) !!} 
          @if ($program_list)
              {!!Form::select('program_id', $program_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('program_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('group_id') ? ' has-error' : '' }}">
          {!! Form::label('group_id', __('Group Name').'*', ['class' => 'control-label required']) !!} 
          @if ($group_list)
              {!!Form::select('group_id', $group_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('group_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('section_id') ? ' has-error' : '' }}">
          {!! Form::label('section_id', __('Section Name').'*', ['class' => 'control-label required']) !!} 
          @if ($section_list)
              {!!Form::select('section_id', $section_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('section_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('medium_id') ? ' has-error' : '' }}">
          {!! Form::label('medium_id', __('Medium').'*', ['class' => 'control-label required']) !!} 
          @if ($medium_list)
              {!!Form::select('medium_id', $medium_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('medium_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('shift_id') ? ' has-error' : '' }}">
          {!! Form::label('shift_id', __('Shift').'*', ['class' => 'control-label required']) !!} 
          @if ($shift_list)
              {!!Form::select('shift_id', $shift_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('shift_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('teacher_id') ? ' has-error' : '' }}">
          {!! Form::label('teacher_id', __('Class Teacher').'*', ['class' => 'control-label required']) !!} 
          @if ($teacher_list)
              {!!Form::select('teacher_id', $teacher_list->pluck('full_name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('teacher_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('seat_number') ? ' has-error' : '' }}">
          {!! Form::label('seat_number', __('Number Of Seat').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('seat_number', null, ['class' => 'form-control decimal input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('seat_number') }}</span>
        </div>
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
