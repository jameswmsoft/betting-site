@extends('Admin.index')

@section('style')
    <link href="{{asset('css/admin/login.css')}}" rel="stylesheet" type="text/css"/>
<style>
.dashboard-stat .visual{
    height: auto;
}
</style>
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
                    <li class="start active open" id="dashboard">
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

                <div style="width: 100%;  border: 3px solid #4bc8ff; margin-bottom: 20px">
                    <div style="height: 46px;background-color: #4bc8ff; color: white; font-size: 25px;padding: 5px 15px">
                        AGENT STATISTICS
                    </div>
                    <div class="row" style="padding: 30px 20px 5px">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['total_agent']}}
                                    </div>
                                    <div class="desc">
                                        AGENTS TOTAL
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-intense">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['ban_agent']}}
                                    </div>
                                    <div class="desc">
                                        BANNED AGENTS
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-haze">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['ticketSold']}}
                                    </div>
                                    <div class="desc">
                                        TICKET SOLD
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple-plum">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['ticketWon']}}
                                    </div>
                                    <div class="desc">
                                        TICKET WON
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div style="width: 100%; border: 3px solid #ffa241; margin-bottom: 20px">
                    <div style="height: 46px;background-color: #ffa241; color: white; font-size: 25px;padding: 5px 15px">
                        GAMES STATISTICS
                    </div>
                    <div class="row" style="padding: 30px 20px 5px">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['tD_active']}}
                                    </div>
                                    <div class="desc">
                                        3DLOT ACTIVE
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple-plum">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['pic_active']}}
                                    </div>
                                    <div class="desc">
                                        PICk&PLAY ACTIVE
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-haze">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['tD_draws']}}
                                    </div>
                                    <div class="desc">
                                        TOTAL DRAW
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-intense">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['pic_draws']}}
                                    </div>
                                    <div class="desc">
                                        TOTAL DRAW
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div style="width: 100%; border: 3px solid #bb417b">
                    <div style="height: 46px;background-color: #bb417b; color: white; font-size: 25px;padding: 5px 15px">
                        PAYMENT STATISTICS
                    </div>
                    <div class="row" style="padding: 30px 20px 5px">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-intense">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['deposit_pending']}}
                                    </div>
                                    <div class="desc">
                                        DEPOSIT PENDING
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['withdraw_pending']}}
                                    </div>
                                    <div class="desc">
                                        WITHDRAW PENDING
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-haze">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['total_deposit']}} $
                                    </div>
                                    <div class="desc">
                                        TOTAL DEPOSIT
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple-plum">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        {{$data['total_withdraw']}} ₹
                                    </div>
                                    <div class="desc">
                                        TOTAL WITHDRAW
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


@stop