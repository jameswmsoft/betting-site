@extends('Admin.index')

@section('style')
    <link href="{{asset('agent/css/games.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('datatable/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('css/admin/login.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('css/admin/admingame.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('/css/admin/dashboard.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <style type="text/css">
        #sample_3_length{
            display: none;
        }
        #sample_3_filter{
            display: none;
        }
        .dataTables_length{
            display: none;
        }
        .dataTables_filter{
            display: none;
        }
        .dataTables_info{
            display: none;
        }
        .dataTables_paginate {
            display: none;
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

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading g_title g_pic_play">4D PRIME ANALYSE MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 tD_analyse_title" style="padding-left: 35px">

                                        <div class="col-md-4 first"><label>4D PRIME </label></div>
                                        <div class="col-md-4 middle"><label style="margin-right: 70px">Analyse</label></div>
                                        <div class="col-md-4 end"><label style="margin-right: 35px">Draw {{$DrawId}}</label></div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row" style="padding-left: 20px">
                                        <div class="col-md-11" style="padding: 0">
                                            <table class="table table-striped table-bordered table-hover tDanalyse sample_pic_analyse">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        BOARD NAME
                                                    </th>
                                                    <th>
                                                        BOARD NUM
                                                    </th>
                                                    <th>
                                                        WINNING PRIZE
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            A BOARD
                                                        </td>
                                                        <td>
                                                            {{$analyData->boardA}}
                                                        </td>
                                                        <td>
                                                            {{$betWinningPrizedata->boardA}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            B BOARD
                                                        </td>
                                                        <td>
                                                            {{$analyData->boardB}}
                                                        </td>
                                                        <td>
                                                            {{$betWinningPrizedata->boardB}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            C BOARD
                                                        </td>
                                                        <td>
                                                            {{$analyData->boardC}}
                                                        </td>
                                                        <td>
                                                            {{$betWinningPrizedata->boardC}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            D BOARD
                                                        </td>
                                                        <td>
                                                            {{$analyData->boardD}}
                                                        </td>
                                                        <td>
                                                            {{$betWinningPrizedata->boardD}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            E BOARD
                                                        </td>
                                                        <td>
                                                            {{$analyData->boardE}}
                                                        </td>
                                                        <td>
                                                            {{$betWinningPrizedata->boardE}}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-1 pic_analyse_unit">
                                            <p>₹</p>
                                            <p>₹</p>
                                            <p>₹</p>
                                            <p>₹</p>
                                            <p>₹</p>
                                        </div>

                                    </div>

                                    <div class="row reportInput">
                                        <div class="col-md-3 inputNum" style="margin-top: 30px;text-align: right">

                                            <div>
                                                <select type="text" id="selectnum">
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                    <option>E</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-2 reportNum">
                                            <button id="report" class="btn btn-primary">REPORT</button>
                                        </div>
                                    </div>

                                    <div class="row winnerReport">

                                        <div class="col-md-1"></div>
                                        <div class="col-md-4 winReportPic">

                                            <p>SOLD : <span id="tDfirst">0</span> ₹</p>
                                            <p>WON : <span id="tDsecond">0</span> ₹</p>
                                            <p>PROFIT : <span id="tDthird">0</span> ₹</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="row declare_title">4D PRIME DECLARE</div>

                                    <div class="row reportInput">
                                        <div class="col-md-4 inputNum inputNum_pic">

                                            <div>
                                                <select type="text" id="declare_selectnum" style="margin-left: 60px">
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                    <option>E</option>
                                                </select>
                                                <input type="text" class="declare_pic" id="declare_pic" name="declareB" value="{{$analyData->boardA}}" readonly>
                                            </div>

                                        </div>
                                        <div class="col-md-3 declare_button_pic">
                                            @if(Session::has('declare'.$DrawId))
                                                <button id="declare" class="btn btn-primary" disabled>DECLARE</button>
                                            @else
                                                <button id="declare" class="btn btn-primary">DECLARE</button>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row declare_prize" style="padding: 20px 0px 0px 63px">

                                        <h3>4D PRIZE</h3>

                                        <p>A digit match = <span id="declare_pic_fdbet">0</span> ₹</p>
                                        <p>AB digit match = <span id="declare_pic_sdbet">0</span> ₹</p>
                                        <p>ABC digit match = <span id="declare_pic_tdbet">0</span> ₹</p>
                                        <p>ABCD digit match = <span id="declare_pic_forbet">0</span> ₹</p>

                                    </div>
                                    <div class="col-md-6 pic_analyse_back">
                                        <a href="{{url('admin/games/show_pic_play')}}" class="btn btn-primary">BACK</a>
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
        $(document).ready(function(){

            var table = $('.sample_pic_analyse');

            // begin: third table
            table.dataTable({

                "columns": [{
                    "orderable": false
                },{
                    "orderable": false
                },{
                    "orderable": true
                }],
                "order": [
                    [2, "asc"],
                ] // set first column as a default sort by asc
            });


            $('#declare_selectnum').on('change',function () {
                var declare_selectnum = $('#declare_selectnum').val();

                if (declare_selectnum == 'A'){
                    $('#declare_pic').val("{{$analyData->boardA}}");
                }else if(declare_selectnum == 'B'){
                    $('#declare_pic').val("{{$analyData->boardB}}");
                }else if(declare_selectnum == 'C'){
                    $('#declare_pic').val("{{$analyData->boardC}}");
                }else if(declare_selectnum == 'D'){
                    $('#declare_pic').val("{{$analyData->boardD}}");
                }else {
                    $('#declare_pic').val("{{$analyData->boardE}}");
                }
            })

            $('#report').on('click',function(e){

                var selectnum = $('#selectnum').val();

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/admin/games/do_pic_report') }}/{{$DrawId}}",
                    method: 'get',
                    data: {
                        selectnum: selectnum
                    },
                    success: function(result){
                        var data = JSON.parse(result);
                        $('#tDfirst').text(data['totalCost']);
                        $('#tDsecond').text(data['winningPrize']);
                        $('#tDthird').text(data['totalCost'] - data['winningPrize']);
                    }});

            });

            $('#declare').on('click',function(){

                $declare_pic = $('#declare_pic').val();
                $declare_selectnum = $('#declare_selectnum').val();

                if(($declare_pic.length == 0)){
                    toastr["error"]("Input the DECLARE NUMBER.", "Notifications");
                    return;
                }else{

                    $.ajax({
                        url: "{{ url('/admin/games/do_pic_declare') }}/{{$DrawId}}",
                        method: 'get',
                        data: {
                            declare_pic: $declare_pic,
                            declare_selectnum: $declare_selectnum
                        },
                        success: function(result){
                            var data = JSON.parse(result);
                            $('#declare_pic_fdbet').text(data['prizeOne']);
                            $('#declare_pic_sdbet').text(data['prizeTwo']);
                            $('#declare_pic_tdbet').text(data['prizeThr']);
                            $('#declare_pic_forbet').text(data['prizeFor']);
                            $('#declare').attr({'disabled':'disabled'});
                        }});
                }
            });
        });
    </script>

@endsection