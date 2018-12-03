<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/responsive/tD_game_responsive.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/responsive/pic_game_responsive.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/buylist.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<style>
.tDLot .tD_main .pic_content .pic_eq_cost {
    margin-left: 0px;
}
</style>
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
                        <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    </li>
                    <li>
                        <a href="<?php echo e(url('agent/dashboard')); ?>">
                            <i class="icon-home"></i>
                            <span class="title">DASHBOARD</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li class="start active open" >
                        <a href="javascript:;">
                            <i class="icon-basket"></i>
                            <span class="title">GAMES</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo e(url('agent/games/show_pic_play')); ?>" style="background-color: #0082ab">
                                    <i class="icon-puzzle"></i>
                                    4D PRIME</a>
                            </li>
                            <li id="tDgames">
                                <a href="<?php echo e(url('agent/games/show_tDlot')); ?>">
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
                                        <a href="<?php echo e(url('agent/games/winnerlist/0')); ?>">
                                            <i class="icon-users"></i>
                                            3D LOT WINNERS</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('agent/games/winnerlist/1')); ?>">
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
                                        <a href="<?php echo e(url('agent/games/buylist/0')); ?>">
                                            <i class="icon-basket"></i>
                                            3D LOT BUYLIST</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('agent/games/buylist/1')); ?>">
                                            <i class="icon-basket"></i>
                                            4D PRIME BUYLIST</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li id="deposit">
                        <a href="<?php echo e(url('agent/deposit')); ?>">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="withdraw">
                        <a href="<?php echo e(url('agent/withdraw')); ?>">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="profile">
                        <a href="<?php echo e(url('agent/profile')); ?>">
                            <i class="icon-user"></i>
                            <span class="title">PORFILE</span>
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
                <section class="currency-area tDLot pic_play">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="rete-list bt_title wow  fadeInUp animated tD_body" data-wow-duration="1.0s" style="visibility: visible; animation-duration: 1.0s; animation-name: fadeInUp">
                                <?php $__currentLoopData = $NowGames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nowGame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tD_draw_title pic_draw_title">
                                    <h1>4D PRIME GAMES</h1>
                                    <h2>DRAW - <?php echo e($nowGame->id); ?></h2>
                                    <button type="button" class="btn btn-primary" onclick="window.location='<?php echo e(url("agent/games/pic_detail")); ?>/<?php echo e($nowGame->id); ?>'">DETAILS</button>
                                </div>
                                <div id="picGamesContainer">
                                    <div class="content tD_main pic_main">
                                    <div class="tD_content pic_content">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tD_ct_ipt">
                                                <form class="form" action="<?php echo e(url('/agent/games/buy_pic_play')); ?>/<?php echo e($nowGame->id); ?>" method="post">
                                                    <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                                    <div class="form-group">
                                                        
                                                        
                                                        <input type="text" id="aname" class="aname" name="aname" maxlength="1" value="<?php echo e($nowGame->boardA); ?>" readonly>
                                                        <input type="hidden" id="bet_aname" name="bet_aname">
                                                        <label>A</label><label id="a_pic_bot"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        
                                                        <input type="text" id="bname" class="bname" name="bname" maxlength="1" value="<?php echo e($nowGame->boardB); ?>" readonly>
                                                        <input type="hidden" id="bet_bname" name="bet_bname">
                                                        <label>B</label><label id="b_pic_bot"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        
                                                        <input type="text" id="cname" class="cname" name="cname" maxlength="1" value="<?php echo e($nowGame->boardC); ?>" readonly>
                                                        <input type="hidden" id="bet_cname" name="bet_cname">
                                                        <label>C</label><label id="c_pic_bot"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        
                                                        <input type="text" id="dname" class="dname" name="dname" maxlength="1" value="<?php echo e($nowGame->boardD); ?>" readonly>
                                                        <input type="hidden" id="bet_dname" name="bet_dname">
                                                        <label>D</label><label id="d_pic_bot"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        
                                                        <input type="text" id="ename" class="ename" name="ename" maxlength="1" value="<?php echo e($nowGame->boardE); ?>" readonly>
                                                        <input type="hidden" id="bet_ename" name="bet_ename">
                                                        <label>E</label><label id="e_pic_bot"></label>
                                                    </div>
                                                    <div class="form-group mul_opt">
                                                        <span>×</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="sname" name="sname">
                                                        
                                                    </div>
                                                    <div class="form-group eq_cost pic_eq_cost">
                                                        <label>PRIZE = <span id="pic_prize">0</span> ₹</label>
                                                        <label id="pic_prizeOne" style="display: none"><?php echo e($nowGame->prizeOne); ?></label>
                                                        <label id="pic_prizeTwo" style="display: none"><?php echo e($nowGame->prizeTwo); ?></label>
                                                        <label id="pic_prizeThr" style="display: none"><?php echo e($nowGame->prizeThr); ?></label>
                                                        <label id="pic_prizeFor" style="display: none"><?php echo e($nowGame->prizeFor); ?></label>
                                                        <input type="hidden" id="pic_total_prize" name="pic_total_prize">
                                                        <label>COST = <span id="total_pic_cost"><?php echo e($nowGame->ticketCost); ?></span> ₹</label>
                                                        <label id="pic_cost" style="display: none"><?php echo e($nowGame->ticketCost); ?></label>
                                                        <input type="hidden" id="input_total_cost" name="total_cost">
                                                    </div>
                                                    <div class="row pic_addbtn">
                                                        <button type="button" class="btn btn-primary  pic_confirm">BUY</button>
                                                        <button type="button" class="btn btn-danger pic_remove">RESET</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </section>


                <div class="row buy_list">
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
                                            BET TYPE
                                        </th>
                                        <th style="padding-right: 35px">
                                            BET NUMBER
                                        </th>
                                        <th>
                                            NO:BET
                                        </th>
                                        <th>
                                            TOTAL COST
                                        </th>
                                        <th>
                                            TIKETID
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->betType); ?> ODD</td>
                                            <td class="board_list">
                                                <div>
                                                    <label>A</label>
                                                    <label>B</label>
                                                    <label>C</label>
                                                    <label>D</label>
                                                    <label>E</label>
                                                </div>
                                                <div>
                                                    <label><?php echo e($data->boardA); ?></label>
                                                    <label><?php echo e($data->boardB); ?></label>
                                                    <label><?php echo e($data->boardC); ?></label>
                                                    <label><?php echo e($data->boardD); ?></label>
                                                    <label><?php echo e($data->boardE); ?></label>
                                                </div>
                                            </td>
                                            <td><?php echo e($data->betTimes); ?></td>
                                            <td><?php echo e($data->totalCost); ?> ₹</td>
                                            <td>
                                                <?php echo e($data->ticketID); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script src="<?php echo e(asset('js/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('agent/js/validate_form.js')); ?>"></script>
    <script src="<?php echo e(asset('agent/js/pic_play.js')); ?>"></script>
    <script>
        setInterval(autoRefreshPage, 3000);

        function autoRefreshPage()
        {

            $.ajax({
                url: "<?php echo e(url('/agent/games/auto_pic_refresh')); ?>/<?php echo e($nowGame->id); ?>",
                method: 'get',

                success: function(result){

                    if(result == '1'){

                        window.location.href = "<?php echo e(url('/agent/games/show_pic_play')); ?>";
                    }
                }});
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>