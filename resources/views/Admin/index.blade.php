<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link href="{{asset('agent/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('agent/css/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href=".{{asset('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS USED BY X-EDITABLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-datepicker/css/datepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css')}}"/>
    <!-- END PLUGINS USED BY X-EDITABLE -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('assets/global/css/components-rounded.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/layout3/css/layout.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/layout3/css/themes/default.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/layout3/css/custom.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('agent/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('agent/css/darkblue.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('toastor/css/toastr.min.css')}}"rel="stylesheet" type="text/css">
    <!-- END THEME STYLES -->
    <link href="{{asset('agent/css/agent.css')}}" rel="stylesheet" type="text/css"/>
<style>
#responsive_admin .modal-content .slimScrollDiv input{
    margin-bottom: 10px;
}

#responsive_admin .modal-content .slimScrollDiv h4 {
    margin-bottom: 24px;
}
#responsive_admin .modal-content .slimScrollDiv{
    height: auto !important;
}
#responsive_admin .modal-content .slimScrollDiv .scroller{
    height: auto !important;
}
</style>
    @yield('style')

</head>
<body class="page-header-fixed page-quick-sidebar-over-content">

<div class="page-header -i navbar navbar-fixed-top">

    <div class="page-header-inner">

        <div class="page-logo">
            <h1>3DLottery</h1>
            <div class="menu-toggler sidebar-toggler hide" >
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" style="background-color:black" data-toggle="collapse" data-target=".navbar-collapse">
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">
					MR.SUPERADMIN </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a id="sample_editable_1_new" data-toggle="modal" href="#responsive_admin">
                                <i class="icon-lock"></i> New Admin </a>
                        </li>
                        <li>
                            <a href="{{url('admin/admin/show_admin_manage')}}">
                                <i class="icon-lock"></i> Manage Admin </a>
                        </li>

                        <li>
                            <a href="{{url('admin/show_changepassword')}}">
                                <i class="icon-lock"></i> Change password </a>
                        </li>
                        <li>
                            <a href="{{url('admin/logout')}}">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>

</div>

<div class="clearfix">
</div>

<div id="responsive_admin" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">NEW ADMIN</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <form role="form" class="form" action="{{url('admin/admin/new_admin')}}" method="post">
                        <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                        <div class="row">
                            <div class="col-md-4 user_title">
                                <h4>USERID : </h4>
                                <h4>PASSWORD : </h4>
                                <h4>MOBILE : </h4>
                            </div>
                            <div class="col-md-8">

                                <p>
                                    <input type="text" id="userid" name="userid" class="col-md-12 form-control">
                                </p>
                                <p>
                                    <input type="password" id="password" name="password" class="col-md-12 form-control">
                                </p>
                                <p>
                                    <input type="text" id="mobile" name="mobile" class="col-md-12 form-control">
                                </p>

                            </div>

                        </div>
                        <div class="user_access">
                            <h4>ADMIN ACCESS</h4>
                            <div class="col-md-6">
                                <div class="portlet-body form">

                                    <div class="form-group form-md-checkboxes">
                                        <div class="md-checkbox-list">
                                            <div class="md-checkbox">
                                                <input type="checkbox" id="checkbox1" name="check_dash" class="md-check" checked>
                                                <label for="checkbox1">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    DASHBOARD </label>
                                            </div>
                                            <div class="md-checkbox">
                                                <input type="checkbox" id="checkbox2" name="check_game" class="md-check" checked>
                                                <label for="checkbox2">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    GAME </label>
                                            </div>
                                            <div class="md-checkbox">
                                                <input type="checkbox" id="checkbox3" name="check_agent" class="md-check" checked>
                                                <label for="checkbox3">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    AGENT </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-group form-md-checkboxes">
                                            <div class="md-checkbox-list">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox4" name="check_deposit" class="md-check" checked>
                                                    <label for="checkbox4">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        DEPOSIT </label>
                                                </div>
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox5" name="check_withdraw" class="md-check" checked>
                                                    <label for="checkbox5">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        WITHDRAW </label>
                                                </div>
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox6" name="check_admin" class="md-check" checked>
                                                    <label for="checkbox6">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        ADMIN </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <button type="button" class="btn green" id="save">Save changes</button>
            </div>
        </div>
    </div>
</div>

@yield('content')

{{--<div class="page-footer">--}}
{{--<div class="page-footer-inner">--}}
{{--2018 &copy; 3Dlottery by Alex.--}}
{{--</div>--}}
{{--<div class="scroll-to-top">--}}
{{--<i class="icon-arrow-up"></i>--}}
{{--</div>--}}
{{--</div>--}}


<script src="{{asset('agent/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('agent/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('agent/js/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('agent/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('datatable/select2.min.js')}}"></script>

<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-CN.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/jquery.mockjax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js')}}"></script>


<script src="{{asset('assets/global/plugins/icheck/icheck.min.js')}}"></script>
<script src="{{asset('agent/js/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('agent/js/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('datapicker/demo.js')}}"></script>

<script src="{{asset('assets/admin/pages/scripts/form-editable.js')}}"></script>
<script src="{{asset('datatable/table-managed.js')}}"></script>
<script src="{{asset('assets/admin/pages/scripts/table-editable.js')}}"></script>
<script src="{{asset('assets/admin/pages/scripts/form-icheck.js')}}"></script>
<script src="{{asset('toastor/js/toastr.min.js')}}"></script>

@yield('script')

@include('partial.toastr')

<script>
    jQuery(document).ready(function() {
        Metronic.init(); //
        Layout.init();
        Demo.init();
        TableManaged.init();
        TableEditable.init();
        FormEditable.init();
        FormiCheck.init();
    });
</script>

<script>
    $('.sidebar-toggler').on('click',function () {
        if ($('.page-sidebar-menu').hasClass('page-sidebar-menu-closed')){
            $('.agent_info').css({'display':'inline-block'});
        }else {
            $('.agent_info').css({'display':'none'});
        }
    })

    $('#save').on('click',function () {
        
        var userid = $('#userid').val();
        var password = $('#password').val();
        var mobile = $('#mobile').val();

        if ((userid.length == 0) || (password.length == 0) || (mobile.length == 0)) {
            toastr["warning"]("please input the fields", "Notifications");
            return;
        } else {
            $('.form').submit();
        }

    })

</script>

</body>

</html>