@extends('Admin.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('agent/css/games_responsive.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('css/admin/admingame.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
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
                    <li class="start active open" id="games">
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
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">

                                <div id="responsive" class="edit_draw" style="float: left">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                                    <div class="row">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">New Draw</h4>
                                                        </div>
                                                        <div class="col-md-12 m_content">
                                                            <form class="form" action="{{url('admin/games/do_edit_draw/')}}/{{$Draw->id}}" method="post">
                                                                <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                                                                <p>START DATE/TIME</p>
                                                                <p class="datapick_start">
                                                                    <a href="javascript:;" id="meeting_start" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                                       {{$Draw->start_date}} </a>
                                                                </p>
                                                                <input type="hidden" id="start_date" name="start_date">
                                                                <p>END DATE/TIME</p>
                                                                <p class="datapick_end">
                                                                    <a href="javascript:;" id="meeting_end" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                                        {{$Draw->end_date}} </a>
                                                                </p>
                                                                <input type="hidden" id="end_date" name="end_date">
                                                                <div class="col-md-5" style="padding-left: 0px">
                                                                    <p>COST</p>
                                                                    <p>
                                                                        <input type="text" id="cost" name="cost" class="col-md-12 form-control cost" value="{{$Draw->ticketCost}}">
                                                                        <label class="price_unit" style="padding-top: 3px">$</label>
                                                                    </p>
                                                                </div>
                                                                <p class="board_title">BOARD NUMBERS</p>
                                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                    <p>
                                                                        <select class="form-control board_e" name="board_e">
                                                                            <option></option>
                                                                            @for($i=1;$i<10;$i++)
                                                                                @if($i == $Draw->boardE)
                                                                                    <option selected>{{$i}}</option>
                                                                                @else
                                                                                    <option>{{$i}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        {{--<input type="text" id="board_a" name="board_a" class="col-md-12 form-control board_num" maxlength="1">--}}
                                                                    </p>

                                                                </div>
                                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                    <p>
                                                                        <select class="form-control board_d" name="board_d">
                                                                            <option></option>
                                                                            @for($i=1;$i<10;$i++)
                                                                                @if($i == $Draw->boardD)
                                                                                    <option selected>{{$i}}</option>
                                                                                @else
                                                                                    <option>{{$i}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        {{--<input type="text" id="board_b" name="board_b" class="col-md-12 form-control board_num" maxlength="1">--}}
                                                                    </p>

                                                                </div>
                                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                    <p>
                                                                        <select class="form-control board_c" name="board_c">
                                                                            <option></option>
                                                                            @for($i=1;$i<10;$i++)
                                                                                @if($i == $Draw->boardC)
                                                                                    <option selected>{{$i}}</option>
                                                                                @else
                                                                                    <option>{{$i}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        {{--<input type="text" id="board_c" name="board_c" class="col-md-12 form-control board_num" maxlength="1">--}}
                                                                    </p>

                                                                </div>
                                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                    <p>
                                                                        <select class="form-control board_b" name="board_b">
                                                                            <option></option>
                                                                            @for($i=1;$i<10;$i++)
                                                                                @if($i == $Draw->boardB)
                                                                                    <option selected>{{$i}}</option>
                                                                                @else
                                                                                    <option>{{$i}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        {{--<input type="text" id="board_d" name="board_d" class="col-md-12 form-control board_num" maxlength="1">--}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                    <p>
                                                                        <select class="form-control board_a" name="board_a">
                                                                            <option></option>
                                                                            @for($i=1;$i<10;$i++)
                                                                                @if($i == $Draw->boardA)
                                                                                    <option selected>{{$i}}</option>
                                                                                @else
                                                                                    <option>{{$i}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        {{--<input type="text" id="board_e" name="board_e" class="col-md-12 form-control board_num" maxlength="1">--}}
                                                                    </p>

                                                                </div>

                                                                <div class="board_abc">
                                                                    <p>A</p>
                                                                    <p>B</p>
                                                                    <p>C</p>
                                                                    <p>D</p>
                                                                    <p>E</p>
                                                                </div>
                                                                <div class="row win_prize">
                                                                    <p>WINNING PRIZE</p>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <label>1 ODD</label>
                                                                            <label class="price_unit">$</label>
                                                                            <input type="text" id="prize_one" name="prize_one" class="col-md-12 form-control" value="{{$Draw->prizeOne}}">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <label>2 ODD</label>
                                                                            <label class="price_unit">$</label>
                                                                            <input type="text" id="prize_two" name="prize_two" class="col-md-12 form-control" value="{{$Draw->prizeTwo}}">

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <label>3 ODD</label>
                                                                            <label class="price_unit">$</label>
                                                                            <input type="text" id="prize_thr" name="prize_thr" class="col-md-12 form-control" value="{{$Draw->prizeThr}}">

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <label>4 ODD</label>
                                                                            <label class="price_unit">$</label>
                                                                            <input type="text" id="prize_for" name="prize_for" class="col-md-12 form-control" value="{{$Draw->prizeFor}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="edit_save" class="btn green">Save</button>
                                                <button type="button" id="edit_cancel" class="btn green">Cancel</button>
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

@section('script')
    <script src="{{asset('agent/js/validate_form.js')}}"></script>
    <script src="{{asset('agent/js/pic_play_board.js')}}"></script>

@endsection