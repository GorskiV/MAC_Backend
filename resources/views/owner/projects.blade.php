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
                            <tr class="headings text-center">
                                <th class="text-center">Project Name</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Feedbacks</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Add Users</th>
                                <th class=" no-link last text-center"><span class="nobr">Details</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($projects->count()>0)
                                @foreach($projects as $u)
                                    <tr class="pointer text-center">
                                        <td class=" ">{{$u->name != "" ? $u->name : "-"}}</td>
                                        @if($u->feedback_types_id ==1)
                                            <td class=" ">Product</td>
                                        @endif
                                        @if($u->feedback_types_id==2)
                                            <td class=" ">Service</td>
                                        @endif
                                        @if($u->feedback_types_id==3)
                                            <td class=" ">Area</td>
                                        @endif
                                        @if($u->feedback_types_id==NULL)
                                            <td class=" ">-</td>
                                        @endif
                                        <td class=" ">{{$u->created_at != "" ? $u->created_at : "-"}}</td>
                                        <td class=" ">{{$u->created_at != "" ? $u->created_at : "-"}}</td>
                                        <td class=" ">{{$u->created_at != "" ? $u->created_at : "-"}}</td>
                                        <td class=" "><a href="{{ URL::to('vendor/my-projects/addusers') }}/{{$u->id}}"><i class="fa fa-plus-circle"></i></a></td>
                                        <td class=" last"><a href="{{ URL::to('vendor/my-projects') }}/{{$u->id}}"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
@endsection