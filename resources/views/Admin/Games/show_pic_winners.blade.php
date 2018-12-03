@extends('Admin.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('datatable/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('css/admin/login.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/admin/admingame.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        #sample_3 label{
            width: 30px;
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
                    <li id="dashboard">
                        <a href="{{url('admin/dashboard')}}">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li id="games" class="start active open">
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
                            <li id="picgames" style="background-color: #0082ab">
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
                            <div class="panel-heading g_title g_pic_play">4D PRIME WINNERS MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs font-green-sharp"></i>
                                                            <span class="caption-subject font-green-sharp bold uppercase">4D PRIME WINNERS MANAGEMENT SYSTEM</span>
                                                        </div>
                                                        <div class="tools">
                                                            <div class="btn-group pull-right">
                                                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <?php $type = 1?>
                                                                    <li>
                                                                        <a href="{{url('admin/games/getexcel_winner')}}/{{$drawID}}/{{$type}}">
                                                                            Export to Excel </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    NO
                                                                </th>
                                                                <th>
                                                                    Username
                                                                </th>
                                                                <th>
                                                                    BetType
                                                                </th>
                                                                <th>
                                                                    Winning Number
                                                                </th>
                                                                <th>
                                                                    Winning Prize
                                                                </th>
                                                                <th>
                                                                    TicketID
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i=1;?>
                                                            @foreach($datas as $data)
                                                                <tr>
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{$data->username}}</td>
                                                                    <td>{{$data->betType}} ODD</td>
                                                                    <td>
                                                                        <div>
                                                                            <label>A</label>
                                                                            <label>B</label>
                                                                            <label>C</label>
                                                                            <label>D</label>
                                                                            <label>E</label>
                                                                        </div>
                                                                        <label>{{$data->boardA}}</label>
                                                                        <label>{{$data->boardB}}</label>
                                                                        <label>{{$data->boardC}}</label>
                                                                        <label>{{$data->boardD}}</label>
                                                                        <label>{{$data->boardE}}</label>
                                                                    </td>
                                                                    <td>{{$data->winningPrize}} ₹</td>
                                                                    <td>{{$data->ticketID}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
