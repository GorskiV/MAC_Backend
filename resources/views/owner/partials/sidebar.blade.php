 <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="background-color: #d9534f">

                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{ URL::to('vendor/') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li><a href="{{ URL::to('vendor/my-projects') }}"><i class="fa fa-star"></i> My Projects</a>
                            <li><a><i class="fa fa-plus-circle"></i> New Project <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{ URL::to('vendor/product-feedback') }}">Product Feedback</a>
                                    </li>
                                    <li><a href="{{ URL::to('vendor/service-feedback') }}">Service Feedback</a>
                                    </li>
                                    <li><a href="{{ URL::to('vendor/area-feedback') }}">Area Feedback</a>
                                    </li>
                                </ul>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->