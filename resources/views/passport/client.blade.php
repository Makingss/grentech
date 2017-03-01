<!--
  Created by PhpStorm.
  User: Making
  Date: 2016/12/23
  Time: 16:24
 -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
                <div class="panel panel-default">
                    <div class="panel-heading">等着吧！</div>

                    <div class="panel-body">
                        首面还没有完善！
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

