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
        <h2> @if($project->feedback_types_id == 1)
                <b>Product Feedback: </b>
            @endif
            @if($project->feedback_types_id == 2)
                <b>Service Feedback: </b>
            @endif
            @if($project->feedback_types_id == 3)
                <b>Area Feedback: </b>
            @endif{{$project->name}}</h2>

        <div class="clearfix"></div>
    </div>
    <div class="col-md-6 col-xs-12 widget widget_tally_box">
        <div class="x_panel">
            <div class="x_content text-center">
                <img src="{{URL::to('/')}}{{$project->photo}}" width="230" alt="">
                <br><br>
            </div>
        </div>
    </div>
    <div class="col-md-9">
    <div class="x_panel">
        <div class="x_title">
            <h2>Give Feedly</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!!  Form::model($user->id,[
                'method' => 'post',
                'route' => ["userfeedback"],
                'class' => '',
                'id' => 'feedback-form',
                'files' => true
            ]) !!}
            @include('errors.errors')
            <div class="col-md-3">
                <h4>Give rating <small>Please hover and click on a star</small></h4>
                <div class="text-center">
                    <br><br>
                    <div id="stars" class="starrr lead glyphicon-3x" style="font-size: 42px !important;"></div>

                    <input type="text" id="count" name="count" value="" class="" style="width: 25px; padding-left: 7px;" hidden>
                </div>
            </div>
            <input type="text" id="hiddenValue" name="projectID" hidden value={{$project->id}}>
            <div class="col-md-4">
                <h4>Elaborate Rating <small>Please elaborate your rating</small></h4>
                <div>
                    <textarea name="comment" id="" cols="20" rows="5" class="form-control"></textarea>
                </div>

            </div>
            <div class="col-md-4">
                <h4>Attach Media <small>You can provide additional media</small></h4>
                <br>
                <div class="form-group">
                    {!! Form::label('photo', 'Add Photo', ['class' => 'col-md-3 control-label']) !!}
                    {!! Form::file('photo', null) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('video', 'Add Video', ['class' => 'col-md-3 control-label']) !!}
                    {!! Form::file('video', null) !!}
                </div>

                <br>
                <div class="form-group text-center">

                        {!! Form::submit('Give Feedly', ['class' => 'btn btn-sucess']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>

    </div>
@endsection