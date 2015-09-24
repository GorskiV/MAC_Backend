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
    <div class="col-md-6 col-xs-12 widget widget_tally_box">
        <div class="x_panel">
            <div class="x_content text-center">
                <img src="{{URL::to('/')}}{{$project->photo}}" width="230" alt="">

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12  widget_tally_box">
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
                        <th class="text-center">Feedbacks</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($projectUsers)>0)
                        @foreach($projectUsers as $u)
                            <tr class="pointer">
                                <td class=" ">{{$u->email}}</td>

                                <td class=" "><a href="{{ URL::to('vendor/my-projects/addusers') }}/{{$u->id}}"><i class="fa fa-star"></i></a></td>
                                <td class=" "><a href="{{ URL::to('/admin/users/') }}/{{$u->id}}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    </div>
@endsection