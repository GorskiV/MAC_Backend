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
        <h2>Add New Area Feedback Project</h2>

        <div class="clearfix"></div>
    </div>
    {!!  Form::model($user->id,[
        'method' => 'post',
        'route' => ["vendorarea"],
        'class' => 'form-horizontal',
        'id' => 'vendor-product-form',
        'files' => true
    ]) !!}

    @include('forms.vendor.area', ['btn' => 'Create'])

    {!! Form::close() !!}
    </div>
@endsection