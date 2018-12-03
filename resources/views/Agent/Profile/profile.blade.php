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
                    <li>
                        <a href="{{url('agent/withdraw')}}">
                    <i class="icon-diamond"></i>
                    <span class="title">WITHDRAW</span>
                    <span class="arrow "></span>
                    </a>
                    </li>
                    <li class="start active open">
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
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!-- PERSONAL INFO TAB -->
                                        <div class="tab-pane active" id="tab_1_1">
                                            <form role="form" class="form" action="{{url('agent/save_profile')}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <label class="control-label">UserName</label>
                                                    <input type="text" id="username" name="username" placeholder="John" class="form-control" value="{{ Auth::User()->username}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="firstname" name="firstname" placeholder="John" class="form-control" value="{{ Auth::User()->firstname}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="lastname" name="lastname" placeholder="Doe" class="form-control" value="{{ Auth::User()->lastname}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="email" name="email" placeholder="Doees@kef.com" class="form-control" value="{{ Auth::User()->email}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="text" id="phone" name="phone" placeholder="+1 646 580 DEMO (6284)" class="form-control" value="{{ Auth::User()->phonenumber}}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" id="c_pass" name="cu_pass" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" id="new_pass" name="new_pass" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" id="re_pass" name="re_pass" class="form-control"/>
                                                </div>
                                                <div class="margiv-top-10">
                                                    <a href="javascript:;" id="save" class="btn green-haze">
                                                        Save Changes </a>
                                                    <a href="javascript:;" class="btn default">
                                                        Cancel </a>
                                                </div>
                                            </form>
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
    <script src="{{asset('agent/js/profile.js')}}"></script>
@endsection