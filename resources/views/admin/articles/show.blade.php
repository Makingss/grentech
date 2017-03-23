@extends('layouts.app') @section('content')

    <h1>{{$article->title}}</h1>
    <article>
        <div class="body"></div>
        {{$article->content}}
    </article>
    <a href="{{url('admin/articles/'.$article->id.'/edit')}}">
    <button type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil"></span> 修改文章
    </button>
    </a>
@stop
