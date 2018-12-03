<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/games_responsive.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('agent/css/winner.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
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
                        <span class="title">DASHBOARD</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    </li>
                    <li>
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
                            <li>
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
                    <li class="start active open">
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
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading g_title">DEPOSIT</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">

                                    <div class="deposite">
                                        <form class="form dp_form" action="<?php echo e(url('agent/do_deposit')); ?>" method="post">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <div class="form-group">
                                                <input type="text" id="deposit" class="form-control" name="deposit" placeholder="deposite">
                                                <button type="button" class="btn blue">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row deposit_list">
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
                                                            Account
                                                        </th>
                                                        <th>
                                                            Date
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1;?>
                                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <tr>
                                                            <td><?php echo e($i++); ?></td>
                                                            <td><?php echo e($data->payment); ?> ₹</td>
                                                            <td><?php echo e($data->created_at); ?></td>
                                                            <td>
                                                                <?php if($data->status == '1'): ?>
                                                                    <button class="btn btn-primary" type="button">Approve</button>
                                                                <?php else: ?>
                                                                    <button class="btn btn-warning" type="button">Pending</button>
                                                                <?php endif; ?>
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
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('agent/js/validate_form.js')); ?>"></script>
    <script>
        $('button').on('click',function () {
            var deposit = $('#deposit').val();
            if (deposit.length != 0) {
                $('.form').submit();
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>