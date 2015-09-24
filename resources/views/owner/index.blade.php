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
    <div class="col-md-6 col-xs-12 widget widget_tally_box">
        <div class="x_panel">
            <div class="x_title">
                <h2>Number of Projects</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h1 class="text-center" style="font-size: 100px;font-weight: 300">5</h1>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 widget widget_tally_box">
        <div class="x_panel">
            <div class="x_title">
                <h2>Projects by Type</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div style="text-align: center; margin-bottom: 17px">
                    <ul class="verticle_bars list-inline">
                        <li>
                            <div class="progress vertical progress_wide bottom">
                                <div class="progress-bar progress-bar-gray" role="progressbar" data-transitiongoal="85" aria-valuenow="85" style="height: 85%;"></div>
                            </div>
                        </li>
                        <li>
                            <div class="progress vertical progress_wide bottom">
                                <div class="progress-bar progress-bar-info" role="progressbar" data-transitiongoal="45" aria-valuenow="45" style="height: 45%;"></div>
                            </div>
                        </li>
                        <li>
                            <div class="progress vertical progress_wide bottom">
                                <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="75" aria-valuenow="75" style="height: 75%;"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="divider"></div>

                <ul class="legend list-unstyled">
                    <li>
                        <p>
                            <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">Product Feedbacks</span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">Service Feedbacks</span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">Area Feedbacks</span>
                        </p>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 widget widget_tally_box">
        <div class="x_panel">
            <div class="x_title">
                <h2>Number of Participants</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h1 class="text-center" style="font-size: 100px;font-weight: 300">356</h1>

            </div>
        </div>
    </div>
@endsection