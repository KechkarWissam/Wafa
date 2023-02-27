<div class="mb-3">
    <label class="form-label" for="{!! $id !!}">{!! $label !!}
        @if($required)
          <a style="color: red">*</a>
        @endif
    </label>
    <input type="{!! $type !!}" id="{!! $id !!}" name="{!! $name !!}"
           class="form-control {!! $size !!} form-control-hover-light"
           placeholder="{!! $placeholder !!}"  
        value="{{isset($value)  ? $value : old($name)}}"
        {!! isset($required) ? $required ? 'required' :'':''  !!}
        >
</div>
