<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>3DLottery.org - 3DLottery is an wonderful lottery system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{asset('back/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--Activeit Stylesheet [ REQUIRED ]-->
    <link href="{{asset('back/css/activeit.min.css')}}" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{asset('back/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{asset('back/css/demo/activeit-demo.min.css')}}" rel="stylesheet">

    <!--SCRIPT-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{asset('back/plugins/pace/pace.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/login.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    {{--<!-- responsive css -->--}}
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('back/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- preloader Start -->
<div id="preloader">
    <div id="status"><img src="{{asset('images/banner/loader.gif')}}" id="preloader_image" alt="loader">
    </div>
</div>

<div id="container" class="cls-container" style="background-color: transparent">
    <!-- BACKGROUND IMAGE -->
    <div id="bg-overlay"></div>
    <!-- LOGIN FORM -->
    <div class="cls-content">
        <div class="cls-content-sm panel panel-colorful panel-login" style="margin-top: 150px !important;">
            <div class="panel-body" style="padding-top: 50px">
                <p class="pad-btm">sign in</p>
                <form class="form" action="{{url('postLogin')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="input-group login_user">
                            <div class="input-group-addon"><i class="fa fa-user" style="color:#FFF !important"></i></div>
                            <input type="text" id="username" name="username" class="form-control" placeholder="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group login_user">
                            <div class="input-group-addon"><i class="fa fa-key" style="color:#FFF !important"></i></div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-left">

                        </div>
                        <div class="col-xs-6">
                            <div class="form-group text-right main_login">
									<span class="btn btn-login btn-labeled fa fa-unlock-alt snbtn" onclick="form_submit()">
                                    	sign_in
                                    </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="{{asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<!--jQuery [ REQUIRED ]-->
<script src="{{asset('back/js/jquery-2.1.1.min.js')}}"></script>

<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{asset('back/js/bootstrap.min.js')}}"></script>

<!--Activeit Admin [ RECOMMENDED ]-->
<script src="{{asset('back/js/activeit.min.js')}}"></script>

<!--Background Image [ DEMONSTRATION ]-->
<script src="{{asset('back/js/demo/bg-images.js')}}"></script>

<!--Bootbox Modals [ OPTIONAL ]-->
<script src="{{asset('back/plugins/bootbox/bootbox.min.js')}}"></script>


<script>

    window.addEventListener("keydown", checkKeyPressed, false);
    function checkKeyPressed(e) {
        if (e.keyCode == "13") {
            $('body').find(':focus').closest('form').find('.snbtn').click();
            if($('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').length > 0){
                $('body').find('.modal-content').find(':focus').closest('form').closest('.modal-content').find('.snbtn_modal').click();
            }
        }
    }

    function form_submit() {
        var user = $('#username').val();
        var password = $('#password').val();
        console.log(user.length);
        if((user.length == 0) || (password.length == 0)){
            return;
        }else {
            $('.form').submit();
        }
    }
</script>
</body>

</html>