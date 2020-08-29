{{--        javascript   loop     --}}
    @if (isset($modal_scripts))
      @foreach ($modal_scripts as $pscript)
        {!! Html::script($pscript) !!}
      @endforeach
    @endif