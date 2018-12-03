@extends('Agent.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/games_responsive.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
@endsection

@section('content')
    <div class="page-container">

        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                    <li class="sidebar-toggler-wrapper">

                        <div class="agent_info">
                            <div class="agent_img"></div>
                            <label class="agent_name">Agent</label>
                        </div>
                        <div class="sidebar-toggler">
                        </div>

                    </li>

                    <li class="sidebar-search-wrapper">

                        <form class="sidebar-search "  method="POST">

                        </form>

                    </li>
                    <li>
                        <a href="{{url('agent/dashboard')}}">
                            <i class="icon-home"></i>
                            <span class="title">DASHBOARD</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li class="start active open">
                        <a href="javascript:;">
                            <i class="icon-basket"></i>
                            <span class="title">GAMES</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{url('agent/games/show_pic_play')}}">
                                    <i class="icon-puzzle"></i>
                                    4D PRIME</a>
                            </li>
                            <li  style="background-color: #0082ab">
                                <a href="{{url('agent/games/show_tDlot')}}">
                                    <i class="icon-puzzle"></i>
                                    3D LOT</a>
                            </li>
                            <li id="picgames">
                                <a href="javascript:;">
                                    <i class="icon-users"></i>
                                    <span class="title">WINNERS</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('agent/games/winnerlist/0')}}">
                                            <i class="icon-users"></i>
                                            3D LOT WINNERS</a>
                                    </li>
                                    <li>
                                        <a href="{{url('agent/games/winnerlist/1')}}">
                                            <i class="icon-users"></i>
                                            4D PRIME WINNERS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-basket"></i>
                                    <span class="title">BUYLIST</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('agent/games/buylist/0')}}">
                                            <i class="icon-basket"></i>
                                            3D LOT BUYLIST</a>
                                    </li>
                                    <li>
                                        <a href="{{url('agent/games/buylist/1')}}">
                                            <i class="icon-basket"></i>
                                            4D PRIME BUYLIST</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('agent/deposit')}}">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('agent/withdraw')}}">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('agent/profile')}}">
                            <i class="icon-user"></i>
                            <span class="title">PORFILE</span>
                            <span class="arrow "></span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="page-content-wrapper">


        <div class="page-content">
             <div class="row g_detail_body">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading g_title">3D LOT GAME</div>
                    <div class="panel-body">
                        <div class="row" style="margin: 0px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default games">
                                    <div class="panel-heading g_draw_title">
                                        <h3>Draw {{$nowgame->id}}</h3>
                                    </div>
                                    <div class="panel-body g_draw_content g_detail">

                                        <h2 class="tD_bet">3D BET</h2>
                                        <p>Single bet cost : {{$nowgame->tDticketCost}} ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>ABC digit match = {{$nowgame->tDprizeOne}} ₹</p>
                                        <p>BC digit match = {{$nowgame->tDprizeTwo}} ₹</p>
                                        <p>C digit match = {{$nowgame->tDprizeThr}} ₹</p>

                                        <h2>2D BET</h2>
                                        <p>Single bet cost : {{$nowgame->sDticketCost}} ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>AB or BC or AC digit match = {{$nowgame->sDprizeOne}} ₹</p>

                                        <h2>1D BET</h2>
                                        <p>Single bet cost : {{$nowgame->fDticketCost}} ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>A or B or C digit match = {{$nowgame->fDprizeOne}} ₹</p>

                                        <hr>
                                        <p>start date : {{$nowgame->start_date}}</p>
                                        <p>end date : {{$nowgame->end_date}}</p>

                                        <a href="{{url('agent/games/do_tDlot')}}/{{$nowgame->id}}" class="btn btn-primary">PLAY</a>
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