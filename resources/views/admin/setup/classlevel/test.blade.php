<div class="row"> 
    {{ Form::open(array('url' => '/admin/save-unit','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-lg-offset-4">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', __('Unit Name').'*', ['class' => 'control-label required']) !!}	
            {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
            <span class="help-block">{{ $errors -> first('name') }}</span>
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

@include('admin.modal_script')

