 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.setup.config.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-config','class' => 'nform-horizontal index_form', 'autocomplete' => 'off', 'files' => true)) }}
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Shop Name').'*', ['class' => 'control-label required']) !!} 
          {!! Form::text('name', $record[0]->name, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
          {!! Form::hidden('id', $record[0]->id, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
          {!! Form::label('mobile', __('Mobile').'*', ['class' => 'control-label required']) !!}  
          {!! Form::text('mobile', $record[0]->mobile, ['class' => 'form-control bn input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('mobile') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
          {!! Form::label('phone', __('Phone'), ['class' => 'control-label']) !!}  
          {!! Form::text('phone', $record[0]->phone, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('phone') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::label('email', __('Email'), ['class' => 'control-label']) !!} 
          {!! Form::text('email', $record[0]->email, ['class' => 'form-control bn input-sm']) !!}
         <span class="help-block">{{ $errors -> first('email') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
          {!! Form::label('address', __('Address').'*', ['class' => 'control-label required']) !!} 
          {!! Form::text('address', $record[0]->address, ['class' => 'form-control bn input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('address') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
          {!! Form::label('logo', __('Logo'), ['class' => 'control-label' ,'style' => 'display:block']) !!} 
          <span> 
          {!! Form::file('logo', ['class' => 'form-control bn input-sm', 'style' => 'width:100px;float:left;margin-right: 10px;']) !!}
          <img width="140px" height="160px" src="{{ asset($record[0]->logo) }}">
          </span>
          
         <span class="help-block">{{ $errors -> first('logo') }}</span>
        </div>
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
