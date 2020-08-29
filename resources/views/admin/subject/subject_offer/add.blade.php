 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.subject.subject_offer.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/search-subject-offer','class' => 'nform-horizontal index_form search_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">
        <div class="form-group {{ $errors->has('program_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('program_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
          @if ($program_offer_list)
              {!!Form::select('program_offer_id', $program_offer_list->pluck('name','id'), null, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors->first('program_offer_id') }}</span>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
        <div class="form-group">
          {!! Form::button(__('Search'), ['type' => 'submit', 'class' => 'btn btn-info btn-sm save-btn']) !!}
          {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
        </div>
      </div>
    {{ Form::close() }}
        <!--              applicant mark entry        -->
      <div class="row list-container">
        
      </div>
    </div>
    </div>
    </div>
  </section>
  @endsection
