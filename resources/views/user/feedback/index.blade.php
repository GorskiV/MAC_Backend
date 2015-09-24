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
        <h2>Give Feedlys</h2>

        <div class="clearfix"></div>
    </div>
    <div class="col-md-4">
        <div class="x_panel fixed_height_390">
            <div class="x_title">
                <h2>Naziv projekta</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div style="text-align: center; overflow: hidden; margin: 10px 5px 0;">
                    <canvas id="canvas_line1" height="156" width="234" style="width: 234px; height: 156px;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection