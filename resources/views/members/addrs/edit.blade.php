@extends('layouts.app')
@section('content')
    <h3>收货地址</h3>
    {!! Form::model($memberaddrs,['method'=>'PATCH','url'=>'/addr/'.$memberaddrs->id]) !!}
    <div class="form-group">
        {!! Form::label('收货人姓名') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('联系电话') !!}
        {!! Form::text('mobile',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('区域') !!}
        {!! Form::text('area',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('地址') !!}
        {!! Form::text('addr',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('保存',['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    @if($errors->any())
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @stop