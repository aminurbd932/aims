 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.subject.merge_subject.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/save-merge-subject','class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4">
        <div class="form-group {{ $errors->has('program_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('program_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
          @if ($program_offer_list)
              {!!Form::select('program_offer_id', $program_offer_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors ->first('program_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Merge Name').'*', ['class' => 'control-label required']) !!} 
          {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('subject_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('subject_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!}
          {!!Form::select('subject_offer_id[]', [], null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors ->first('subject_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('subject_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('subject_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('subject_offer_id[]', [], null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors ->first('subject_offer_id') }}</span>
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
