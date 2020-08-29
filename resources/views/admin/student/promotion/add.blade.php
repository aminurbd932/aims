 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.student.promotion.breadcrumb')
  <section class="content custom-content">
  <div class="row">
   	<div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/search-promotion','class' => 'nform-horizontal index_form search_offer_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-lg-offset-3">
        <div class="form-group {{ $errors->has('promotion_type') ? ' has-error' : '' }}">
          {!! Form::label('promotion_type', __('Promotion Type').'*', ['class' => 'control-label required']) !!}
          {!!Form::select('promotion_type', promotionType(), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors ->first('promotion_type') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 program_offer_id_pp" style="display: none;">
        <div class="form-group {{ $errors->has('program_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('program_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
              {!!Form::select('program_offer_id', $program_offer_list->pluck('name','id'), null, ['class' => 'form-control'])!!}
         <span class="help-block">{{ $errors ->first('program_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 admission_offer_id_pp">
        <div class="form-group {{ $errors->has('admission_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('admission_offer_id', __('Admission Offer Name').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('admission_offer_id', $admission_offer_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors ->first('admission_offer_id') }}</span>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
   			<div class="form-group">
     		  {!! Form::button(__('Search'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm save-btn']) !!}
     		  {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
        </div>
      </div>
   	{{ Form::close() }}
    <div class="row list-container">
        
    </div>
    </div>
    </div>
   	</div>
  </section>
  @endsection
