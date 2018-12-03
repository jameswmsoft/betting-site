
<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Agent Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link href="<?php echo e(asset('agent/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('agent/css/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?php echo e(asset('agent/css/components.css')); ?>" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('agent/css/layout.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('agent/css/darkblue.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('toastor/css/toastr.min.css')); ?>"rel="stylesheet" type="text/css">
    <!-- END THEME STYLES -->
    <link href="<?php echo e(asset('/agent/css/agent.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>

    <?php echo $__env->yieldContent('style'); ?>

</head>
<body class="page-header-fixed page-quick-sidebar-over-content">

<div class="page-header -i navbar navbar-fixed-top">

    <div class="page-header-inner">

        <div class="page-logo">
            <h1>3DLottery</h1>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li id="balance_body">BALANCE : <span id="balance"><?php if(Session::has('balance')): ?> <?php echo e(Session::get('balance')); ?><?php endif; ?></span> ₹</li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">
					Nick </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="<?php echo e(url('agent/show_changepassword')); ?>">
                                <i class="icon-lock"></i> Change password </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('agent/logout')); ?>">
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

<?php echo $__env->yieldContent('content'); ?>

    
        
            
        
        
            
        
    


<script src="<?php echo e(asset('agent/js/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('agent/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('agent/js/bootstrap-hover-dropdown.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('agent/js/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('datatable/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/dataTables.bootstrap.js')); ?>"></script>

<script src="<?php echo e(asset('agent/js/metronic.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('agent/js/layout.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('datatable/table-managed.js')); ?>"></script>
<script src="<?php echo e(asset('toastor/js/toastr.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

<?php echo $__env->make('partial.toastr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    jQuery(document).ready(function() {
        Metronic.init(); //
        Layout.init();
        TableManaged.init();
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

</script>

</body>

</html>