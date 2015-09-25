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
        <h2>Highlighted Feedlys</h2>

        <div class="clearfix"></div>
    </div>
    @foreach($projectList as $p)
        <div class="col-md-4">
            <div class="x_panel fixed_height_390">
                <div class="x_title">
                    <h2>
                        @if($p->feedback_types_id == 1)
                            <b>Product Feedback: </b>
                        @endif
                        @if($p->feedback_types_id == 2)
                            <b>Service Feedback: </b>
                        @endif
                        @if($p->feedback_types_id == 3)
                            <b>Area Feedback: </b>
                        @endif
                        {{$p->name}}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div style="text-align: center; overflow: hidden; margin: 10px 5px 0;" >
                        <img src="{{URL::to('/')}}{{$p->photo}}" width="230" alt="">
                        <br><br>
                        <a href="{{ URL::to('user/feedback')}}/{{$p->id}}" class="btn btn-sucess">Give Feedly</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection