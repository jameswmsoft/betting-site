@extends('Agent.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/responsive/tD_game_responsive.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/buylist.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
@endsection

@section('content')
    <div class="page-container">

        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
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
                        <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    </li>
                    <li>
                        <a href="{{url('agent/dashboard')}}">
                            <i class="icon-home"></i>
                            <span class="title">DASHBOARD</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li class="start active open" >
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
                            <li id="tDgames">
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
                                <a href="javascript:;" style="background-color: #33aca0">
                                    <i class="icon-basket"></i>
                                    BUYLIST</a>
                                <ul class="sub-menu" style="display: block;">
                                    <li class="open">
                                        <a href="{{url('agent/games/buylist/0')}}" @if($type == 0) style="background-color: #0082ab!important;" @endif>
                                            <i class="icon-basket"></i>
                                            3D LOT BUYLIST</a>
                                    </li>
                                    <li>
                                        <a href="{{url('agent/games/buylist/1')}}" @if($type == 1) style="background-color: #0082ab!important;" @endif>
                                            <i class="icon-basket"></i>
                                            4D PRIME BUYLIST</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li id="deposit">
                        <a href="{{url('agent/deposit')}}">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="withdraw">
                        <a href="{{url('agent/withdraw')}}">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="profile">
                        <a href="{{url('agent/profile')}}">
                            <i class="icon-user"></i>
                            <span class="title">PORFILE</span>
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

                <div class="row buy_list">
                    <div class="col-sm-12 col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->

                        <div class="panel panel-default">
                            @if($type == 0)
                                <div class="panel-heading g_title">3D LOT GAME SOLDLIST</div>
                            @else
                                <div class="panel-heading g_title">4D PRIME GAME SOLDLIST</div>
                            @endif
                            <div class="panel-body">
                                <div class="portlet light">
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th>
                                            NO
                                        </th>
                                        <th>
                                            DrawID
                                        </th>
                                        <th>
                                            BET TYPE
                                        </th>
                                        <th style="padding-right: 5px">
                                            BET NUMBER
                                        </th>
                                        <th>
                                            NO:BET
                                        </th>
                                        <th>
                                            TOTAL COST
                                        </th>
                                        <th>
                                            TIKETID
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($datas as $data)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->drawId}}</td>
                                            <td>{{$data->betType}} ODD</td>
                                            <td class="board_list">
                                                <div>
                                                    <label>A</label>
                                                    <label>B</label>
                                                    <label>C</label>
                                                    @if($type == 1)
                                                        <label>D</label>
                                                        <label>E</label>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label>{{$data->boardA}}</label>
                                                    <label>{{$data->boardB}}</label>
                                                    <label>{{$data->boardC}}</label>
                                                    @if($type == 1)
                                                        <label>{{$data->boardD}}</label>
                                                        <label>{{$data->boardE}}</label>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$data->betTimes}}</td>
                                            <td>{{$data->totalCost}} ₹</td>
                                            <td>
                                                {{$data->ticketID}}
                                            </td>
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


@endsection






