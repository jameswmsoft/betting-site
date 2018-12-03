@extends('Agent.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/games_responsive.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/winner.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
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
                    <li>
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
                    <li class="start active open">
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
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading g_title">WITHDRAW</div>
                                <div class="panel-body">
                                    <div class="row" style="margin: 0px;">

                                        <div class="deposite">
                                            <form class="form" action="{{url('agent/do_withdraw')}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="withdraw" name="withdraw" placeholder="withdraw">
                                                    <button type="button" class="btn blue">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="row deposit_list">
                                            <div class="col-sm-12 col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    NO
                                                                </th>
                                                                <th>
                                                                    Account
                                                                </th>
                                                                <th>
                                                                    Date
                                                                </th>
                                                                <th>
                                                                    Status
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i=1;?>
                                                            @foreach($datas as $data)

                                                                <tr>
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{$data->payment}} ₹</td>
                                                                    <td>{{$data->created_at}}</td>
                                                                    <td>
                                                                        @if($data->status == '1')
                                                                            <button class="btn btn-primary" type="button">Approve</button>
                                                                        @else
                                                                            <button class="btn btn-warning" type="button">Pending</button>
                                                                        @endif
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
                </div>

        </div>

    </div>
@endsection


@section('script')
    <script src="{{asset('agent/js/validate_form.js')}}"></script>
    <script>
        $('button').on('click',function () {
            var withdraw = $('#withdraw').val();
            if (withdraw.length != 0) {
                $('.form').submit();
            }
        })
    </script>
@endsection