@if(!$records->isEmpty())
<div class="col-md-12">
    {{ Form::open(array('url' => '/admin/save-student-promotion','class' => 'nform-horizontal index_form save_form', 'autocomplete' => 'off')) }}
    <div class="row">
      <div class="col-md-5 col-sm-6 col-xs-12 col-lg-5">
        <table class="table table-bordered com_table">
          <thead>
            <tr>
              <th>{!! Form::checkbox(null, null, false, ['class' => 'check-all pull-left',]) !!}&nbsp;#</th>
              <th>Applicant Name</th>
              <th style="width: 80px;">Roll No</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($records as $key => $row)
            <tr>
              <td>{!! Form::checkbox('applicant_id[]', $row->id) !!}&nbsp;{{ $key + 1 }}</td>
              <td>{{ $row->full_name."(".$row->applicant_code.")" }}</td>
              <td>
                {!! Form::text('roll_no[]', null, ['class' => 'form-control input-sm decimal']) !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12 col-lg-7">
        <div class="box box-solid box-info">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title">Program Offer Name</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!!Form::select('program_offer_id', $program_offer_list->pluck('name','id'), null, ['class' => 'form-control program_offer_id', 'required' => 'required'])!!}
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-solid box-warning">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title">Subject Offer List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body subject-list-container">
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
    
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
      <div class="form-group">
        {!! Form::button(__('Remove'), ['class' => 'btn btn-info btn-sm all-remove-btn']) !!}
        {!! Form::button(__('Save'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm promotion-save-btn']) !!}
        {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning btn-sm reset-btn']) !!}
      </div>
    </div>
    </div>

    <script type="text/javascript">
      $(".nform-horizontal").validator();
    </script>
@endif