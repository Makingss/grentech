<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">
    <label for="{{$id}}" class="col-sm-{{$width['label']}} control-label">{{$label}}</label>
    <div class="col-sm-{{$width['field']}}">
        @include('admin::form.error')
        <select class="js-example-basic-multiple form-control" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>
        <input type="hidden" name="{{$name}}[]"/>
        @include('admin::form.help-block')
    </div>
</div>



