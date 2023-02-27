<label for="{{$name}}" class="form-label">{{$label}}
    @if(isset($required) && $required)
        <a style="color: red">*</a>
    @endif
</label>
<!-- Select -->
    <select  class="form-control select2" style="width: 100%;"
            {{isset($multiple)?'multiple':''}} {{isset($required) && $required?'required':''}}
             data-placeholder="{{$placeholder}}"
             id="{{$name}}" name="{{$name}}">
            <option disabled selected>{{$placeholder}}</option>
        @foreach($data as $item)
            <option
                @if(isset($model) && $model)
                    {{ ($item->id)===($model) ?'selected':'' }}
                @endif value="{{$item->id}}">{{$item->name ?? $item->full_name}}
            </option>
        @endforeach
    </select>

