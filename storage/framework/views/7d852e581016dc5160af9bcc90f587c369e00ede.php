

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('datatable/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/login.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/admingame.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <a href="<?php echo e(url('admin/dashboard')); ?>">
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
                            <li id="tDgames">
                                <a href="<?php echo e(url('admin/games/show_tDlot')); ?>">
                                    <i class="icon-puzzle"></i>
                                    3D LOT</a>
                            </li>
                            <li id="picgames" style="background-color: #0082ab">
                                <a href="<?php echo e(url('admin/games/show_pic_play')); ?>">
                                    <i class="icon-basket"></i>
                                    PIK & PLPY</a>
                            </li>
                        </ul>
                    </li>
                    <li id="deposit">
                        <a href="<?php echo e(url('admin/agent/show_agent_manage')); ?>">
                            <i class="icon-rocket"></i>
                            <span class="title">AGENT MANAGEMENT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="deposit">
                        <a href="<?php echo e(url('admin/deposit')); ?>">
                            <i class="icon-rocket"></i>
                            <span class="title">DEPOSIT</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="withdraw">
                        <a href="<?php echo e(url('admin/withdraw')); ?>">
                            <i class="icon-diamond"></i>
                            <span class="title">WITHDRAW</span>
                            <span class="arrow "></span>
                        </a>
                    </li>
                    <li id="profile">
                        <a href="<?php echo e(url('admin/website')); ?>">
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
                            <div class="panel-heading g_title g_pic_play">PIC & PLAY GAME</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light">
                                                    <div class="portlet-body">
                                                        <div class="table-toolbar">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="btn-group newbtn_draw">
                                                                        <button id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#responsive">
                                                                            Add New <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    DrawID
                                                                </th>
                                                                <th>
                                                                    Start Date/Time
                                                                </th>
                                                                <th>
                                                                    End Date/Time
                                                                </th>
                                                                <th>
                                                                    Total SOLD
                                                                </th>
                                                                <th>
                                                                    TICKETCOST
                                                                </th>
                                                                <th>
                                                                    WINNING PRIZE
                                                                </th>
                                                                <th>
                                                                    ACTION
                                                                </th>
                                                                <th>
                                                                    STATUS
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody style="font-size: 15px">
                                                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="odd gradeX">
                                                                    <td>
                                                                        <?php echo e($data->id); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($data->start_date); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($data->end_date); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($data->totalSold); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($data->ticketCost); ?>

                                                                    </td>
                                                                    <td>
                                                                        <div style="display: block">
                                                                            <span>1 ODD : </span><?php echo e($data->prizeOne); ?> $ /
                                                                            <span>2 ODD : </span><?php echo e($data->prizeTwo); ?> $
                                                                        </div>
                                                                        <span>3 ODD : </span><?php echo e($data->prizeThr); ?> $ /
                                                                        <span>4 ODD : </span><?php echo e($data->prizeFor); ?> $
                                                                    </td>
                                                                    <td class="center" style="width: 15%">
                                                                        <a href="<?php echo e(url('admin/games/show_edit_pic_draw')); ?>/<?php echo e($data->id); ?>" class="btn btn-primary" type="button">Edit</a>
                                                                        <div style="display: block;margin-top: 10px">
                                                                        <button class="btn btn-primary contentDelete" type="button">ANALYSE</button>
                                                                        <button class="btn btn-primary contentDelete" type="button">DICLARE</button>
                                                                        </div>
                                                                    </td>

                                                                    <td class="center" style="width: 15%">

                                                                        <?php

                                                                        $start_date = strtotime($data->start_date);
                                                                        $end_date = strtotime($data->end_date);

                                                                        $now = strtotime(date("y-m-d"));

//                                                                        date_default_timezone_set("Asia/Kolkata");

                                                                        ?>
                                                                        <?php if($now<$start_date): ?>
                                                                            <a class="btn btn-warning" type="button">PENDING</a>
                                                                        <?php endif; ?>

                                                                        <?php if(($start_date<$now) && ($now<$end_date)): ?>
                                                                            <a class="btn btn-success" type="button">ACTIVE</a>
                                                                        <?php endif; ?>

                                                                        <?php if($end_date<$now): ?>
                                                                            <a class="btn btn-danger" type="button">EXPIRE</a>
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

                <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">New Draw</h4>
                                        </div>
                                        <div class="col-md-12 m_content">
                                            <form class="form" action="<?php echo e(url('admin/games/save_new_draw')); ?>">
                                            <p>START DATE/TIME</p>
                                            <p class="datapick_start">
                                                <a href="javascript:;" id="meeting_start" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                    <?php date_default_timezone_set("Asia/Kolkata");
                                                    echo date("d/m/Y G:i");
                                                    ?>
                                                </a>
                                            </p>
                                                <input type="hidden" id="start_date" name="start_date">
                                            <p>END DATE/TIME</p>
                                            <p class="datapick_end">
                                                <a href="javascript:;" id="meeting_end" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                    <?php date_default_timezone_set("Asia/Kolkata");
                                                    echo date("d/m/Y G:i");
                                                    ?>
                                                </a>
                                            </p>
                                                <input type="hidden" id="end_date" name="end_date">
                                                <div class="col-md-5" style="padding-left: 0px">
                                                    <p>COST</p>
                                                    <p>
                                                        <input type="text" id="cost" name="cost" class="col-md-12 form-control cost">
                                                        <label class="price_unit" style="padding-top: 3px">$</label>
                                                    </p>
                                                </div>
                                                <p class="board_title">BOARD NUMBERS</p>
                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                    <p>
                                                        <select class="form-control" name="board_a">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                            <option>D</option>
                                                            <option>E</option>
                                                        </select>
                                                        
                                                    </p>

                                                </div>
                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                    <p>
                                                        <select class="form-control" name="board_b">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                            <option>D</option>
                                                            <option>E</option>
                                                        </select>
                                                        
                                                    </p>

                                                </div>
                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                    <p>
                                                        <select class="form-control" name="board_c">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                            <option>D</option>
                                                            <option>E</option>
                                                        </select>
                                                        
                                                    </p>

                                                </div>
                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                    <p>
                                                        <select class="form-control" name="board_d">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                            <option>D</option>
                                                            <option>E</option>
                                                        </select>
                                                        
                                                    </p>
                                                </div>
                                                <div class="col-md-1 div_board" style="padding-right: 0px">
                                                    <p>
                                                        <select class="form-control" name="board_e">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                            <option>D</option>
                                                            <option>E</option>
                                                        </select>
                                                        
                                                    </p>

                                                </div>

                                            <div class="board_abc">
                                                <p>A</p>
                                                <p>B</p>
                                                <p>C</p>
                                                <p>D</p>
                                                <p>E</p>
                                            </div>
                                            <div class="row win_prize">
                                                <p>WINNING PRIZE</p>
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>1 ODD</label>
                                                        <label class="price_unit">$</label>
                                                        <input type="text" id="prize_one" name="prize_one" class="col-md-12 form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>2 ODD</label>
                                                        <label class="price_unit">$</label>
                                                        <input type="text" id="prize_two" name="prize_two" class="col-md-12 form-control">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>3 ODD</label>
                                                        <label class="price_unit">$</label>
                                                        <input type="text" id="prize_thr" name="prize_thr" class="col-md-12 form-control">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>4 ODD</label>
                                                        <label class="price_unit">$</label>
                                                        <input type="text" id="prize_for" name="prize_for" class="col-md-12 form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="create" class="btn green">Create</button>
                                <button type="button" id="reset" class="btn green">Reset</button>
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
        $(document).ready(function() {
            $('#create').on('click', function () {
                $('#start_date').val($('#meeting_start').text());

                $('#end_date').val($('#meeting_end').text());

                var cost = $('#cost').val();
                var prize_one = $('#prize_one').val();
                var prize_two = $('#prize_two').val();
                var prize_thr = $('#prize_thr').val();
                var prize_for = $('#prize_for').val();

                if ((cost.length == 0) || (prize_one.length == 0) || (prize_two.length == 0) || (prize_for.length == 0) || (prize_thr.length == 0)) {
                    toastr["warning"]("Input the all info correctly", "Notifications");
                    return;
                } else {
                    $('.form').submit();
                }
            })
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>