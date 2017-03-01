@extends('app')
@section('content')

<h3>Content Page</h3>
@if(count($fisrt)>0)
<ul>
	@foreach($fisrt as $fis)
	<li>{{$fis}}</li> 
	@endforeach
	<li>{!!$name!!}</li>
</ul>
@endif 
@stop
