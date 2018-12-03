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
                                <a href="<?php echo e(url('agent/games/show_pic_play')); ?>">
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
                                <a href="javascript:;" style="background-color: #33aca0">
                                    <i class="icon-basket"></i>
                                    BUYLIST</a>
                                <ul class="sub-menu" style="display: block;">
                                    <li class="open">
                                        <a href="<?php echo e(url('agent/games/buylist/0')); ?>" <?php if($type == 0): ?> style="background-color: #0082ab!important;" <?php endif; ?>>
                                            <i class="icon-basket"></i>
                                            3D LOT BUYLIST</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('agent/games/buylist/1')); ?>" <?php if($type == 1): ?> style="background-color: #0082ab!important;" <?php endif; ?>>
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

                <div class="row buy_list">
                    <div class="col-sm-12 col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->

                        <div class="panel panel-default">
                            <?php if($type == 0): ?>
                                <div class="panel-heading g_title">3D LOT GAME SOLDLIST</div>
                            <?php else: ?>
                                <div class="panel-heading g_title">4D PRIME GAME SOLDLIST</div>
                            <?php endif; ?>
                            <div class="panel-body">
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
                                                    <?php if($type == 1): ?>
                                                        <label>D</label>
                                                        <label>E</label>
                                                    <?php endif; ?>
                                                </div>
                                                <div>
                                                    <label><?php echo e($data->boardA); ?></label>
                                                    <label><?php echo e($data->boardB); ?></label>
                                                    <label><?php echo e($data->boardC); ?></label>
                                                    <?php if($type == 1): ?>
                                                        <label><?php echo e($data->boardD); ?></label>
                                                        <label><?php echo e($data->boardE); ?></label>
                                                    <?php endif; ?>
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

        </div>

    </div>


<?php $__env->stopSection(); ?>







<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>