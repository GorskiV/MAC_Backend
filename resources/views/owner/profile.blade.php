@extends('layouts.master')

@section('logo')
    @include('owner.partials.logo')
@endsection

@section('sidebar')
    @include('owner.partials.sidebar')
@endsection

@section('nav')
    @include('owner.partials.nav')
@endsection

@section('content')

    <div class="x_title">
        <h2>Vendor Profile</h2>

        <div class="clearfix"></div>
    </div>
    {!!  Form::model($user->id,[
        'method' => 'post',
        'route' => ["vendorupdate"],
        'class' => 'form-horizontal',
        'id' => 'vendor-details-form'
    ]) !!}

    @include('forms.user', ['btn' => 'Submit'])

    {!! Form::close() !!}
    </div>
@endsection