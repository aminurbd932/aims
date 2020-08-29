<style type="text/css">
  .custom_message {
        padding: 5px 30px;
    margin-bottom: 5px;
    margin-top: 5px;
  }
</style>
@if (session('success') || session('unsuccess') || session('error') || $errors->any())
<div class="row">
    <div class="col-md-8 col-md-offset-2">
     @if ($errors->any())
        <div class="alert alert-danger alert-dismissible custom_message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    		{{-- Success Message --}}
    @if (session('success'))
      <div class="alert alert-success alert-dismissible custom_message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('success') }}
      </div>
    @endif
   			 {{-- Unsuccess Message --}}
    @if (session('unsuccess'))
      <div class="alert alert-warning alert-dismissible custom_message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('unsuccess') }}
      </div>
    @endif
   			 {{-- Error Message --}}
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible custom_message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('error') }}
      </div>
    @endif

    </div>
</div>
@endif
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div id="messages" style="display: none;    padding: 5px;">
        <div class="alert fade in alert-dismissible custom_message" style="margin-bottom: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <div id="text"></div>
        </div>
      </div>

    </div>
</div>