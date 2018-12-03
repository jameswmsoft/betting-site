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
                    <li id="deposit">
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
                            <div class="panel-heading g_title g_pic_play">ADMIN MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div id="responsive" class="edit_admin_body">
                                            <div class="modal-dialog" style="margin: 30px 0px">
                                                <div class="modal-content" style="box-shadow: none">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Edit ADMIN</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                                            @foreach($admins as $admin)
                                                                <form role="form" class="form" action="{{url('admin/admin/do_edit_admin')}}/{{$admin->id}}" method="post">
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
                                                                                <input type="text" id="admin_userid" name="userid" class="col-md-12 form-control" value="{{$admin->username}}">
                                                                            </p>
                                                                            <p>
                                                                                <input type="password" id="admin_old_pass" name="old_pass" class="col-md-12 form-control">
                                                                            </p>
                                                                            <p>
                                                                                <input type="password" id="admin_new_pass" name="new_pass" class="col-md-12 form-control">
                                                                            </p>
                                                                            <p>
                                                                                <input type="text" id="admin_mobile" name="mobile" class="col-md-12 form-control" value="{{$admin->phonenumber}}">
                                                                            </p>

                                                                        </div>

                                                                    </div>
                                                                    <div class="user_access">
                                                                        <h4>ADMIN ACCESS</h4>
                                                                        <div class="col-md-6">
                                                                            <div class="portlet-body form">

                                                                                <div class="form-group form-md-checkboxes">
                                                                                    <div class="md-checkbox-list">
                                                                                        <div class="md-checkbox">
                                                                                            <input type="checkbox" id="admin_checkbox1" name="check_dash" class="md-check" checked>
                                                                                            <label for="checkbox1">
                                                                                                <span></span>
                                                                                                <span class="check"></span>
                                                                                                <span class="box"></span>
                                                                                                DASHBOARD </label>
                                                                                        </div>
                                                                                        <div class="md-checkbox">
                                                                                            <input type="checkbox" id="admin_checkbox2" name="check_game" class="md-check" checked>
                                                                                            <label for="checkbox2">
                                                                                                <span></span>
                                                                                                <span class="check"></span>
                                                                                                <span class="box"></span>
                                                                                                GAME </label>
                                                                                        </div>
                                                                                        <div class="md-checkbox">
                                                                                            <input type="checkbox" id="admin_checkbox3" name="check_agent" class="md-check" checked>
                                                                                            <label for="checkbox3">
                                                                                                <span></span>
                                                                                                <span class="check"></span>
                                                                                                <span class="box"></span>
                                                                                                AGENT </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="portlet-body form">
                                                                                <form role="form">
                                                                                    <div class="form-group form-md-checkboxes">
                                                                                        <div class="md-checkbox-list">
                                                                                            <div class="md-checkbox">
                                                                                                <input type="checkbox" id="admin_checkbox4" name="check_deposit" class="md-check" checked>
                                                                                                <label for="checkbox4">
                                                                                                    <span></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>
                                                                                                    DEPOSIT </label>
                                                                                            </div>
                                                                                            <div class="md-checkbox">
                                                                                                <input type="checkbox" id="admin_checkbox5" name="check_withdraw" class="md-check" checked>
                                                                                                <label for="checkbox5">
                                                                                                    <span></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>
                                                                                                    WITHDRAW </label>
                                                                                            </div>
                                                                                            <div class="md-checkbox">
                                                                                                <input type="checkbox" id="admin_checkbox6" name="check_admin" class="md-check" checked>
                                                                                                <label for="checkbox6">
                                                                                                    <span></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>
                                                                                                    ADMIN </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </form>

                                                                            </div>
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

                                        var userid = $('#admin_userid').val();
                                        var old_pass = $('#admin_old_pass').val();
                                        var new_pass = $('#admin_new_pass').val();
                                        var mobile = $('#admin_mobile').val();
                                        var check = $('#admin_checkbox1').val();

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