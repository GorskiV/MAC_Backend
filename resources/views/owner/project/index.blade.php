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
        <h2><b>Project: </b>{{$project->name}}</h2>

        <div class="clearfix"></div>
    </div>
    <div class="col-md-3 col-xs-12 text-center">

            <div class="x_content text-center">
                <img src="{{URL::to('/')}}{{$project->photo}}" width="150" alt="">

            </div>

    </div>
    <div class="col-md-9 col-xs-12  widget_tally_box">
        <div class="x_panel">
            <div class="x_title">
                <h2>Project Feedbacks</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content text-center">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                    <tr class="headings text-center">
                        <th class="text-center">User</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Comment</th>
                        <th class="text-center">Photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($feedbacks->count()>0)
                        @foreach($feedbacks as $u)
                            <tr class="pointer">
                                @foreach($projectUsers as $pu)
                                    @if($pu->id == $u->id)
                                        <td class=" ">{{$pu->email}}</td>
                                    @endif
                                @endforeach
                                <td class=" ">{{$u->rating}}</td>
                                <td class=" ">{{$u->comment}}</td>
                                <td class=" ">
                                    @if($u->photo != null)
                                        <a href="{{URL::to('/')}}{{$u->photo}}" alt=""><i class="fa fa-image"></i></a>
                                    @else

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
                <div id="placeholder-div1"></div>



            </div>
        </div>
    </div>
    <div class="col-md-3 widget_tally_box">
        <div class="x_panel">
            <div class="x_title">
                <h2>Project Users</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content text-center">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                    <tr class="headings text-center">
                        <th class="text-center">User</th>
                        <th class="text-center">Send Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($projectUsers)>0)
                        @foreach($projectUsers as $u)
                            <tr class="pointer">
                                <td class=" ">{{$u->email}}</td>
                                <td class=" "><a href="mailto:{{$u->email}}"><i class="fa fa-envelope"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
                <div id="placeholder-div1"></div>



            </div>
        </div>
        </div>
    </div>

    </div>
@endsection