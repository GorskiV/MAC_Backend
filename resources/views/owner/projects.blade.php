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
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    My Projects
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                            <tr class="headings">
                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Feedbacks</th>
                                <th>Rating</th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@if($users->count()>0)--}}
                                {{--@foreach($users as $u)--}}
                                    {{--<tr class="pointer">--}}
                                        {{--<td class=" ">{{$u->first_name != "" ? $u->first_name : "-"}}</td>--}}
                                        {{--<td class=" ">{{$u->last_name != "" ? $u->last_name : "-"}} </td>--}}
                                        {{--<td class=" ">{{$u->email != "" ? $u->email : "-"}} </td>--}}
                                        {{--@if($u->role_id==1)--}}
                                            {{--<td class=" ">Admin</td>--}}
                                        {{--@endif--}}
                                        {{--@if($u->role_id==2)--}}
                                            {{--<td class=" ">User</td>--}}
                                        {{--@endif--}}
                                        {{--@if($u->role_id==3)--}}
                                            {{--<td class=" ">Vendor</td>--}}
                                        {{--@endif--}}
                                        {{--@if($u->role_id==NULL)--}}
                                            {{--<td class=" ">-</td>--}}
                                        {{--@endif--}}
                                        {{--<td class=" last"><a href="{{ URL::to('/admin/users/') }}/{{$u->id}}"><i class="fa fa-search"></i></a> &nbsp;&nbsp;&nbsp;--}}
                                            {{--<a href="{{ URL::to('/admin/users/edit') }}/{{$u->id}}"><i class="fa fa-pencil"></i></a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
@endsection