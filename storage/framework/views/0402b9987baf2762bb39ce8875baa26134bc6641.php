

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/responsive/tD_game_responsive.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/buylist.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-container">

        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
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
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li class="start active open" >
                        <a href="javascript:;">
                            <i class="icon-basket"></i>
                            <span class="title">Games</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li id="tDgames">
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
                                <a href="<?php echo e(url('agent/games/buylist')); ?>" style="background-color: #0082ab">
                                    <i class="icon-basket"></i>
                                    BUYLIST</a>
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
                                            DrawID
                                        </th>
                                        <th>
                                            BET TYPE
                                        </th>
                                        <th style="padding-right: 5px">
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
                                            <td><?php echo e($data->drawId); ?></td>
                                            <td><?php echo e($data->betType); ?> ODD</td>
                                            <td class="board_list">
                                                <div>
                                                    <label>A</label>
                                                    <label>B</label>
                                                    <label>C</label>
                                                </div>
                                                <div>
                                                    <label><?php echo e($data->boardA); ?></label>
                                                    <label><?php echo e($data->boardB); ?></label>
                                                    <label><?php echo e($data->boardC); ?></label>
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


<?php $__env->stopSection(); ?>







<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>