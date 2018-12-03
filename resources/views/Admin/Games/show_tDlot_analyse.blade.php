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
                            <li id="tDgames" style="background-color: #0082ab">
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
                            <div class="panel-heading g_title g_pic_play">3D LOT ANALYSE MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 tD_analyse_title">

                                        <div class="col-md-4 first"><label>Draw {{$DrawId}} </label></div>
                                        <div class="col-md-4 middle"><label>Analyse</label></div>
                                        <div class="col-md-4 end"><label>3D LOT</label></div>                                   
                                        
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="row" style="padding-left: 20px">
                                        <div class="col-md-4" style="padding: 0">
                                            <table class="table table-striped table-bordered table-hover tDanalyse sample_analyse">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            A
                                                        </th>
                                                        <th>
                                                            TOTAL SOLD
                                                        </th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>                                                                    
                                                    @for ($i = 0; $i < 10; $i++) 

                                                
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$betTimedata->boardA[$i]}}</td>
                                                            

                                                        </tr>

                                                    @endfor
                                                    
                                                </tbody>
                                            </table> 
                                        </div> 
                                        <div class="col-md-4" style="padding: 0">
                                            <table class="table table-striped table-bordered table-hover tDanalyse sample_analyse">
                                                <thead>
                                                    <tr>
                                                       
                                                        <th>
                                                            B
                                                        </th>
                                                        <th>
                                                            TOTAL SOLD
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>                                                                    
                                                    @for ($i = 0; $i < 10; $i++) 

                                                
                                                        <tr>
                                                           
                                                            <td>{{$i}}</td>
                                                            <td>{{$betTimedata->boardB[$i]}}</td>
                                                          

                                                        </tr>

                                                    @endfor
                                                    
                                                </tbody>
                                            </table>  
                                        </div>
                                        <div class="col-md-4" style="padding: 0">
                                            <table class="table table-striped table-bordered table-hover tDanalyse sample_analyse">
                                                <thead>
                                                    <tr>
                                                       
                                                        <th>
                                                            C
                                                        </th>
                                                        <th>
                                                            TOTAL SOLD
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                                    
                                                    @for ($i = 0; $i < 10; $i++) 

                                                
                                                        <tr>
                                                            
                                                            <td>{{$i}}</td>
                                                            <td>{{$betTimedata->boardC[$i]}}</td>

                                                        </tr>

                                                    @endfor
                                                    
                                                </tbody>
                                            </table> 
                                        </div>
                                                                  
                                    </div>

                                    <div class="row profitableNum">
                                        <label>PROFITABLE NUMBER A = {{$min[0]}} / B = {{$min[1]}} / C = {{$min[2]}}</label>
                                    </div>

                                    <div class="row reportInput">                                    
                                        <div class="col-md-4 inputNum">
                                            <div>
                                                <label>A</label>
                                                <label>B</label>
                                                <label>C</label>
                                            </div>
                                            <div>
                                                <input type="text" id="reportA" name="reportA" maxlength="1">
                                                <input type="text" id="reportB" name="reportB" maxlength="1">
                                                <input type="text" id="reportC" name="reportC" maxlength="1">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-2 reportNum">
                                            <button id="report" class="btn btn-primary">REPORT</button>
                                        </div>
                                    </div>

                                    <div class="row winnerReport">
                                        <p class="winreporttitle">WINNERS REPORT</p>
                                        <div class="col-md-4 winReportTD">
                                            <p>3D BET</p>
                                            <p>1ST : <span id="tDfirst">0</span></p>
                                            <p>2ND : <span id="tDsecond">0</span></p>
                                            <p>3RD : <span id="tDthird">0</span></p>
                                        </div>
                                        <div class="col-md-4 winReportSD">
                                            <p>2D BET</p>
                                            <p>1ST : <span id="sDfirst">0</span></p>
                                        </div>
                                        <div class="col-md-4 winReportFD">
                                            <p>1D BET</p>
                                            <p>1ST : <span id="fDfirst">0</span></p>
                                            <div class="reportBack">
                                                <a href="{{url('admin/games/back_tD_report')}}" class="btn btn-primary">BACK</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                        <div class="row declare_title">3D LOT DECLARE</div>
                                
                                        <div class="row reportInput">                                    
                                            <div class="col-md-4 inputNum">
                                                <div>
                                                    <label>A</label>
                                                    <label>B</label>
                                                    <label>C</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="declareA" name="declareA" maxlength="1">
                                                    <input type="text" id="declareB" name="declareB" maxlength="1">
                                                    <input type="text" id="declareC" name="declareC" maxlength="1">
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="row declare_button">
                                            @if($status != '')
                                                <button id="declare" class="btn btn-primary" disabled>DECLARE</button>
                                            @else
                                                <button id="declare" class="btn btn-primary">DECLARE</button>
                                            @endif
                                        </div>

                                        <div class="row declare_prize">

                                            <h3>3D LOT</h3>
                                            <p>ABC digit match = <span id="declare_td_tdbet">0</span> ₹</p>

                                            <p>BC digit match = <span id="declare_td_sdbet">0</span> ₹</p>

                                            <p>C digit match = <span id="declare_td_fdbet">0</span> ₹</p>
                                            <h3>2D LOT</h3>
                                            <p>AB or BC or AC digit match = <span id="declare_sdbet">0</span> ₹</p>

                                            <h3>1D LOT</h3>
                                            <p>A or B or C digit match = <span id="declare_fdbet">0</span> ₹</p>
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
        $('#report').on('click',function(e){
            $reportA = $('#reportA').val();
            $reportB = $('#reportB').val();
            $reportC = $('#reportC').val();

            if(($reportA.length == 0) || ($reportB.length == 0) || ($reportC.length == 0)){
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else{
                e.preventDefault();
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
               
                $.ajax({
                  url: "{{ url('/admin/games/do_tD_report') }}/{{$DrawId}}",
                  method: 'get',
                  data: {
                     reportA: $reportA,
                     reportB: $reportB,
                     reportC: $reportC
                  },
                  success: function(result){
                    var data = JSON.parse(result);
                     $('#tDfirst').text(data['tDfirst']);
                     $('#tDsecond').text(data['tDsecond']);
                     $('#tDthird').text(data['tDthird']);
                     $('#sDfirst').text(data['sDfirst']);
                     $('#fDfirst').text(data['fDfirst']);
                  }});
               }
        });

        $('#declare').on('click',function(){

            $declareA = $('#declareA').val();
            $declareB = $('#declareB').val();
            $declareC = $('#declareC').val();

            if(($declareA.length == 0) || ($declareB.length == 0) || ($declareC.length == 0)){
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else{

                $.ajax({
                  url: "{{ url('/admin/games/do_tDlot_declare') }}/{{$DrawId}}",
                  method: 'get',
                  data: {
                     declareA: $declareA,
                     declareB: $declareB,
                     declareC: $declareC
                  },
                  success: function(result){
                    var data = JSON.parse(result);
                     $('#declare_td_tdbet').text(data['tDprizeOne']);
                     $('#declare_td_sdbet').text(data['tDprizeTwo']);
                     $('#declare_td_fdbet').text(data['tDprizeThr']);
                     $('#declare_sdbet').text(data['sDprizeOne']);
                     $('#declare_fdbet').text(data['fDprizeOne']);
                     $('#declare').attr({'disabled':'disabled'});
                  }});
            }
        });
   });
</script>

@endsection