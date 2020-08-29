 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.admission.applicant_result.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-applicant-result/'.$record->id,'class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-6 col-lg-offset-3">
          <table class="table edit_com_table">
            <thead>
              <tr class="default">
                <th>Admisison Offer Name</th>
                <td>{{ $record->admissionOffer->name }}</td>
              </tr>
              <tr class="danger">
                <th>Applicant Name</th>
                <td>{{ $record->full_name }}</td>
              </tr>
              <tr class="primary">
                <th>Applicant Code</th>
                <td>{{ $record->applicant_code }}</td>
              </tr>
              <tr class="info">
                <th>Serial</th>
                <th>
                  {!! Form::text('serial', $record->serial, ['class' => 'form-control input-sm decimal', 'required' => 'required']) !!}
                </th>
              </tr>
              <tr class="active">
                <th>Status</th>
                <th>
                  {!!Form::select('assign_status', resultStatus(1), $record->assign_status, ['class' => 'form-control','required' => 'required'])!!}
                </th>
              </tr>
            </thead>
          </table>
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
