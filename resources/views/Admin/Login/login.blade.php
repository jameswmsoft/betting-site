<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="300">
    <title>login</title>

    <!--STYLESHEET-->
    <!--Roboto Font [ OPTIONAL ]-->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">
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
    <script src="{{asset('back/plugins/pace/pace.min.js')}}"></script>
</head>

<body>
<div id="container" class="cls-container">
    <!-- BACKGROUND IMAGE -->
    <div id="bg-overlay"></div>
    <!-- LOGIN FORM -->
    <div class="cls-content">
        <div class="cls-content-sm panel panel-colorful panel-login" style="margin-top: 50px !important;">
            <div class="panel-body" style="padding-top: 50px">
                <p class="pad-btm">sign in</p>
                <form class="form" action="{{url('admin/login')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user" style="color:#FFF !important"></i></div>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-key" style="color:#FFF !important"></i></div>
                        <input type="password" name="password" class="form-control" placeholder="password">
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
        $('.form').submit();
    }
</script>
</body>
</html>
