<div class="form-group{{$errors->has('captcha')? ' has-error' : ''}}">
    <label for="captcha" class="col-md-4 control-label">验证码</label>
    <div class="col-md-3">
        <input type="text" name="captcha" class="form-control">
    </div>
    <div class="col-md-4">
        <a id="refresh-captcha">
            <img src="{{captcha_src()}}"
                 title="刷新验证码"
                 alt="验证码"
                 width="120"
                 height="36"
                 border="0"
                 id="captcha"
                 data-captcha-config="default"
            >
        </a>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-8">
        @if ($errors->has('captcha'))
            <span class="help-block">
                <strong>{{ $errors->first('captcha') }}</strong>
            </span>
        @endif
    </div>
</div>