 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.user.permission.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-permission','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
   		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
  			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Permission Name').'*', ['class' => 'control-label required']) !!}	
          {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
          {!! Form::label('display_name', __('Display Name').'*', ['class' => 'control-label required']) !!}	
          {!! Form::text('display_name', null, ['class' => 'form-control bn input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('display_name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
          {!! Form::label('description', __('Description'), ['class' => 'control-label']) !!} 
          {!! Form::text('description', null, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('description') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
          {!! Form::label('role_id', __('Role Name'), ['class' => 'control-label']) !!} 
          <br>
          @if ($role_name)
            @foreach ($role_name as $key  => $role)
              {!! Form::checkbox('role_id[]', $role->id) !!}&nbsp;&nbsp;<?php echo $role->name ?>
            @endforeach
          @endif
         <span class="help-block">{{ $errors -> first('role_id') }}</span>
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
