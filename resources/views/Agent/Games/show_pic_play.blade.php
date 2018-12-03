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
                                <a href="{{url('agent/games/show_pic_play')}}" style="background-color: #0082ab">
                                    <i class="icon-puzzle"></i>
                                    4D PRIME</a>
                            </li>
                            <li>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading g_title g_pic_play">4D PRIME GAME</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                        @foreach($games_pic as $game_pic)
                                            <?php

                                            $start_date = $game_pic->start_date;

                                            $end_date = $game_pic->end_date;

                                            $close_date = str_replace("/","-",$game_pic->end_date);

                                            $close_date = date("G:i:s",strtotime($close_date));

                                            date_default_timezone_set("Asia/Kolkata");

                                            $now = date("d/m/Y H:i");


                                            ?>

                                                @if(($start_date <= $now) && ($now <= $end_date))
                                                    <div class="panel panel-default games">
                                                        <div class="panel-heading g_draw_title">
                                                            <h3>Draw {{$game_pic->id}}</h3>
                                                            <p>{{$game_pic->start_date}}</p>
                                                        </div>
                                                        <div class="panel-body g_draw_content">
                                                            <div class="row">
                                                                <div class="g_close">
                                                                    ClOSE IN : {{$close_date}}
                                                                </div>
                                                            </div>
                                                            <div class="row g_play">
                                                                <a href="{{url('agent/games/do_pic_play')}}/{{$game_pic->id}}" class="btn" style="float: left">PLAY</a>
                                                                <a href="{{url('agent/games/pic_detail')}}/{{$game_pic->id}}" class="btn" style="float: right">DETAILS</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                        @endforeach


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