@extends('layouts.master')

@section('logo')
    @include('user.partials.logo')
@endsection

@section('sidebar')
    @include('user.partials.sidebar')
@endsection

@section('nav')
    @include('user.partials.nav')
@endsection

@section('content')

    <div class="x_title">
        <h2>User Profile</h2>

        <div class="clearfix"></div>
    </div>
    {!!  Form::model($user->id,[
    'method' => 'post',
    'route' => ["profileupdate"],
    'class' => 'form-horizontal',
    'id' => 'user-details-form'
    ]) !!}

    @include('forms.user', ['btn' => 'Submit'])

    {!! Form::close() !!}
    </div>
@endsection