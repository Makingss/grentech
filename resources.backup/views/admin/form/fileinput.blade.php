        {{--<div class="form-group">--}}
            {{--<input id="file-fr" name="files" type="file" multiple>--}}
        {{--</div>--}}

<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-{{$width['label']}} control-label">{{$label}}</label>

    <div class="col-md-8">

        @include('admin::form.error')
        <div class="form-group">
            <input id="file-fr" name="img[]" type="file" multiple="multiple">
        </div>
        @include('admin::form.help-block')

    </div>
</div>
