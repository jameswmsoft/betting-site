

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/games_responsive.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <a href="<?php echo e(url('agent/dashboard')); ?>">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li class="start active open">
                        <a href="javascript:;">
                            <i class="icon-basket"></i>
                            <span class="title">Games</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li  style="background-color: #0082ab">
                                <a href="<?php echo e(url('agent/games/show_tDlot')); ?>">
                                    <i class="icon-puzzle"></i>
                                    3D LOT</a>
                            </li>
                            <li id="picgames">
                                <a href="<?php echo e(url('agent/games/winnerlist')); ?>">
                                    <i class="icon-users"></i>
                                    WINNERS</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('agent/games/buylist')); ?>">
                                    <i class="icon-basket"></i>
                                    BUYLIST</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(url('agent/deposit')); ?>">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('agent/withdraw')); ?>">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('agent/profile')); ?>">
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading g_title">3D LOT GAME</div>
                    <div class="panel-body">
                        <div class="row" style="margin: 0px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default games">
                                    <div class="panel-heading g_draw_title">
                                        <h3>Draw <?php echo e($nowgame->id); ?></h3>
                                    </div>
                                    <div class="panel-body g_draw_content g_detail">

                                        <h2 class="tD_bet">3D BET</h2>
                                        <p>Single bet cost : <?php echo e($nowgame->tDticketCost); ?> ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>ABC digit match = <?php echo e($nowgame->tDprizeOne); ?> ₹</p>
                                        <p>BC digit match = <?php echo e($nowgame->tDprizeTwo); ?> ₹</p>
                                        <p>C digit match = <?php echo e($nowgame->tDprizeThr); ?> ₹</p>

                                        <h2>2D BET</h2>
                                        <p>Single bet cost : <?php echo e($nowgame->sDticketCost); ?> ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>AB or BC or AC digit match = <?php echo e($nowgame->sDprizeOne); ?> ₹</p>

                                        <h2>1D BET</h2>
                                        <p>Single bet cost : <?php echo e($nowgame->fDticketCost); ?> ₹</p>
                                        <p>Winning Prize :</p>
                                        <p>A or B or C digit match = <?php echo e($nowgame->fDprizeOne); ?> ₹</p>

                                        <hr>
                                        <p>start date : <?php echo e($nowgame->start_date); ?></p>
                                        <p>end date : <?php echo e($nowgame->end_date); ?></p>

                                        <a href="<?php echo e(url('agent/games/do_tDlot')); ?>/<?php echo e($nowgame->id); ?>" class="btn btn-primary">PLAY</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>