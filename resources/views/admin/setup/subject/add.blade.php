 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.setup.subject.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-subject','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
   		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-lg-offset-1">
  			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Subject Name').'*', ['class' => 'control-label required']) !!}	
          {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
          {!! Form::label('code', __('Subject Code').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('code', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('code') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('class_level_id') ? ' has-error' : '' }}">
          {!! Form::label('class_level_id', __('Class Level').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('class_level_id', $class_level_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors -> first('class_level_id') }}</span>
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
