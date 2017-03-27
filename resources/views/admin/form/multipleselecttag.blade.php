{{--<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">--}}

    {{--<label for="{{$id}}" class="col-sm-{{$width['label']}} control-label">{{$label}}</label>--}}
    {{--<div class="col-sm-{{$width['field']}}">--}}

        {{--@include('admin::form.error')--}}

        {{--<select class="js-example-basic-multiple form-control" multiple="multiple">--}}
            {{--@foreach($options as $values => $option)--}}
                {{--{{$option}}--}}
                {{--@endforeach--}}
            {{--<option value="AL">Alabama</option>--}}
            {{--<option value="WY">Wyoming</option>--}}
        {{--</select>--}}
        {{--<input type="hidden" name="{{$name}}[]" />--}}

        {{--@include('admin::form.help-block')--}}

    {{--</div>--}}
{{--</div>--}}




<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-{{$width['label']}} control-label">{{$label}}</label>
    <div class="col-sm-{{$width['field']}}">

        @include('admin::form.error')

        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}[]" multiple="multiple" data-placeholder="{{ $placeholder }}" {!! $attributes !!} >
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{  in_array($select, (array)old($column, $value)) ?'selected':'' }}>{{$option}}</option>
            @endforeach
        </select>
        <input type="hidden" name="{{$name}}[]" />

        @include('admin::form.help-block')

    </div>
</div>


