@extends('Admin.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('datatable/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('css/admin/login.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/admin/admingame.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-container">

        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                        <div class="agent_info">
                            <div class="agent_img"></div>
                            <label class="agent_name">SuperAdmin</label>
                        </div>
                        <div class="sidebar-toggler"></div>

                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    <li class="sidebar-search-wrapper">
                        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                        <form class="sidebar-search "  method="POST">

                        </form>
                        <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    </li>
                    <li id="dashboard">
                        <a href="{{url('admin/dashboard')}}">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li id="games">
                        <a href="javascript:;">
                            <i class="icon-basket"></i>
                            <span class="title">Games</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li id="tDgames">
                                <a href="{{url('admin/games/show_tDlot')}}">
                                    <i class="icon-puzzle"></i>
                                    3D LOT</a>
                            </li>
                            <li id="picgames">
                                <a href="{{url('admin/games/show_pic_play')}}">
                                    <i class="icon-basket"></i>
                                    4D PRIME</a>
                            </li>
                        </ul>
                    </li>
                    <li class="start active open" id="deposit">
                        <a href="{{url('admin/agent/show_agent_manage')}}">
                            <i class="icon-rocket"></i>
                            <span class="title">AGENT MANAGEMENT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="deposit">
                        <a href="{{url('admin/deposit')}}">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="withdraw">
                        <a href="{{url('admin/withdraw')}}">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="profile">
                        <a href="{{url('admin/website')}}">
                            <i class="icon-user"></i>
                            <span class="title">WEBSITE CONTROL</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <!-- BEGIN ANGULARJS LINK -->
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>


        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading g_title g_pic_play">AGENT MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div id="responsive_agent" class="edit_admin_body">
                        <div class="modal-dialog" style="margin: 30px 0px">
                            <div class="modal-content" style="box-shadow: none">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Edit Agent</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                        @foreach($users as $user)
                                        <form role="form" class="form" action="{{url('admin/agent/do_edit_agent')}}/{{$user->id}}" method="post">
                                            <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                                            <div class="row">
                                                <div class="col-md-4 user_title">
                                                    <h4>USERID : </h4>
                                                    <h4>OLD PASSWORD : </h4>
                                                    <h4>NEW PASSWORD : </h4>
                                                    <h4>MOBILE : </h4>
                                                </div>
                                                <div class="col-md-8">

                                                    <p>
                                                        <input type="text" id="agent_userid" name="userid" class="col-md-12 form-control" value="{{$user->username}}">
                                                    </p>
                                                    <p>
                                                        <input type="password" id="agent_old_pass" name="old_pass" class="col-md-12 form-control">
                                                    </p>
                                                    <p>
                                                        <input type="password" id="agent_new_pass" name="new_pass" class="col-md-12 form-control">
                                                    </p>
                                                    <p>
                                                        <input type="text" id="agent_mobile" name="mobile" class="col-md-12 form-control" value="{{$user->phonenumber}}">
                                                    </p>

                                                </div>

                                            </div>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn green" id="edit_save">Save changes</button>
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $(document).ready(function() {

            $('#edit_save').on('click',function () {

                var userid = $('#agent_userid').val();
                var old_pass = $('#agent_old_pass').val();
                var new_pass = $('#agent_new_pass').val();
                var mobile = $('#agent_mobile').val();
                var check = $('#checkbox1').val();

                console.log(check);
                if ((userid.length == 0) || (mobile.length == 0)) {
                    toastr["warning"]("please input the fields", "Notifications");
                    return;
                } else {
                    if ((old_pass.length != 0) || (new_pass.length != 0)) {
                        if ((old_pass.length != 0) && (new_pass.length != 0)) {
                            $('.form').submit();
                        }else {
                            toastr["warning"]("please input the password correctly", "Notifications");
                            return;
                        }
                    }else {
                        $('.form').submit();
                    }
                }

            })
        });
    </script>
@endsection