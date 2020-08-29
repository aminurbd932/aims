 @extends('../admin/admin-app')
@section('admin-content')
  @include('admin.subject.subject_offer.breadcrumb')
  <section class="content custom-content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body"> 
    {{ Form::open(array('url' => '/admin/update-subject-offer/'.$record->id,'class' => 'nform-horizontal index_form', 'autocomplete' => 'off')) }}
      <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
        <div class="box box-success">
          <div class="box-header with-border"><h6 class="box-title">Subject Distribute Information</h6></div>
          <div class="box-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Program Offer Name</th>
                  <td>{{ $record->programOffer->name }}</td>
                </tr>
                <tr>
                  <th>Subject Name</th>
                  <td>{{ $record->subject->name }}</td>
                </tr>
                <tr>
                  <th>Teacher Name</th>
                  <td>
                    @if ($teacher_list)
                      {!!Form::select('teacher_id', $teacher_list->pluck('full_name','id'), $record->teacher_id, ['class' => 'form-control', 'required' => 'required'])!!}
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Total Obtain Mark</th>
                  <td>
                    {!! Form::text('subject_mark', round($record->subject_mark), ['class' => 'form-control input-sm decimal', 'required' => 'required']) !!}
                  </td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
        <div class="box box-success">
            <div class="box-header with-border"><h6 class="box-title">Distribute Mark</h6></div>
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mark</th>
                    <th>Mark(%)</th>
                    <th>Divided Mark</th>
                  </tr>
                </thead>
                <tbody>
                  @php($total_divided_mark = 0)
                  @foreach ($mark_type as $key => $row)
                    @php
                      $total_divided_mark += (isset($distribute_mark[$row->id]['divided_mark']) ? $distribute_mark[$row->id]['divided_mark']: 0)
                    @endphp
                    <tr>
                      <td>{!! Form::checkbox('check[]', $key+1) !!}</td>
                      <td>
                        {{ $row->name }}
                        {!! Form::hidden('mark_type_id[]', $row->id, ['class' => 'form-control input-sm']) !!}
                        {!! Form::hidden('distribute_id[]',  (isset($distribute_mark[$row->id]['id']) ? round($distribute_mark[$row->id]['id']): 0), ['class' => 'form-control input-sm']) !!}
                      </td>
                      <td>
                        {!! Form::text('orginal_mark[]', (isset($distribute_mark[$row->id]['orginal_mark']) ? round($distribute_mark[$row->id]['orginal_mark']): ''), ['class' => 'form-control input-sm decimal mark', 'readonly' => 'readonly']) !!}
                      </td>
                      <td>
                        {!! Form::text('percent_mark[]', (isset($distribute_mark[$row->id]['percent_mark']) ? $distribute_mark[$row->id]['percent_mark']: ''), ['class' => 'form-control input-sm decimal percent', 'readonly' => 'readonly']) !!}
                      </td>
                      <td>
                        {!! Form::text('divided_mark[]', (isset($distribute_mark[$row->id]['divided_mark']) ? $distribute_mark[$row->id]['divided_mark']: ''), ['class' => 'form-control input-sm decimal divided_mark', 'readonly' => 'readonly']) !!}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">Total Obtain Mark</th>
                    <th><span class="total">{{ $total_divided_mark }}{!! Form::hidden('total_divided_mark',  $total_divided_mark) !!}</span></th>
                  </tr>
                </tfoot>
              </table>
            </div>
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
