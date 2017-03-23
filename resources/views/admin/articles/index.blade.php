@extends('layouts.app') @section('content')

<h1>Article</h1>
@foreach($article as $key => $values)
	<h2><a href="{{url('admin/articles',$values->id)}}">{{$values->title}}</a></h2>
	<article>
	<div class="body"></div>
	{{$values->content}}
	</article>
@endforeach @stop
