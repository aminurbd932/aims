 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.subject.merge_subject.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-merge-subject/'.$record->id,'class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4">
        <div class="form-group {{ $errors->has('program_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('program_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
          @if ($program_offer_list)
              {!!Form::select('program_offer_id', $program_offer_list->pluck('name','id'), $record->subjectOffer->program_offer_id, ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors ->first('program_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-md-2 col-lg-2">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name', __('Merge Name').'*', ['class' => 'control-label required']) !!} 
          {!! Form::text('name', $record->name, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
         <span class="help-block">{{ $errors -> first('name') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('subject_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('subject_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!}
          @if ($records['records'])
            {!!Form::select('subject_offer_id[]', $records['records']->pluck('name','id'), (isset($records['active_sub'][0]) ? $records['active_sub'][0] : 0), ['class' => 'form-control', 'required' => 'required'])!!}
          @endif
         <span class="help-block">{{ $errors ->first('subject_offer_id') }}</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <div class="form-group {{ $errors->has('subject_offer_id') ? ' has-error' : '' }}">
          {!! Form::label('subject_offer_id', __('Program Offer Name').'*', ['class' => 'control-label required']) !!} 
          {!!Form::select('subject_offer_id[]', $records['records']->pluck('name','id'), (isset($records['active_sub'][1]) ? $records['active_sub'][1] : 0), ['class' => 'form-control', 'required' => 'required'])!!}
         <span class="help-block">{{ $errors ->first('subject_offer_id') }}</span>
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
