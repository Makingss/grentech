<head>
    <meta charset="UTF-8">
    {{--{!! we_js() !!}--}}
{{--    {!! we_css() !!}--}}


</head>
<body>
{{--<label for="{{$id}}" class="col-sm-10} control-label">{{$label}}</label>--}}

  <textarea class="form-control we-container" name="content" id="wangeditor" style="height:500px;max-height:800px;" cols="5">
       {!! $content !!}

  </textarea>
  <br>
{!! we_config('wangeditor') !!}

</body>