@extends('layouts.app')
@section('content')
    <h3>收货地址</h3>
    <a href="{{action("Members\MemberaddrsController@create")}}">
        <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span> 新建地址
        </button>
    </a>
    @foreach($memberaddrs as $key => $values)
        {{--    <h2><a href="{{action("ArticleController@show",[$values->id])}}">{{$values->title}}</a></h2>--}}
        <h3><a href="{{action("Members\MemberaddrsController@edit",[$values->id])}}">{{$values->area.$values->addr}}</a></h3>
        <article>
            <div class="body">
                {{$values->mobile}}
                {{$values->name}}
                {{$values->addr}}

            </div>
        </article>
    @endforeach @stop