 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.setup.company.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-company','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
   		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
  			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Company/Shop Name').'*', ['class' => 'control-label required']) !!}	
          {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
          {!! Form::label('mobile', __('Mobile'), ['class' => 'control-label']) !!}  
          {!! Form::text('mobile', null, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('mobile') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
          {!! Form::label('phone', __('Phone'), ['class' => 'control-label']) !!}  
          {!! Form::text('phone', null, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::label('email', __('Email'), ['class' => 'control-label']) !!}	
          {!! Form::text('email', null, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('email') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
          {!! Form::label('type', __('Type').'*', ['class' => 'control-label required']) !!} 
          @if ($company_type)
              {!!Form::select('type', $company_type, null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors -> first('type') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-10 col-lg-10">
        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
          {!! Form::label('address', __('Address'), ['class' => 'control-label']) !!} 
          {!! Form::text('address', null, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('address') }}</span>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center save_top">
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
