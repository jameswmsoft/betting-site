

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('datatable/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/login.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/admingame.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/dashboard.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <style>
        .edit_tD_draw .edit_tD_draw_body .slimScrollDiv .scroller{
            height: auto !important;
        }
    </style>
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
                            <li id="tDgames" style="background-color: #0082ab">
                                <a href="<?php echo e(url('admin/games/show_tDlot')); ?>">
                                    <i class="icon-puzzle"></i>
                                    3D LOT</a>
                            </li>
                            <li id="picgames">
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

                        <div id="responsive" class="edit_tD_draw">
                            <div class="modal-dialog">
                                <div class="modal-content tD_lot_modal">

                                    <div class="modal-body edit_tD_draw_body">
                                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                            <div class="row">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">EDIT 3D LOT DRAW</h4>
                                                </div>
                                                <div class="col-md-12 m_content">
                                                    <form class="form" action="<?php echo e(url('admin/games/do_edit_tD_draw')); ?>/<?php echo e($Draw->id); ?>" method="post">
                                                        <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                                        <p>START DATE/TIME</p>
                                                        <p class="datapick_start">
                                                            <a href="javascript:;" id="meeting_start" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                                <?php echo e($Draw->start_date); ?>

                                                            </a>
                                                        </p>
                                                        <input type="hidden" id="start_date" name="start_date">
                                                        <p>END DATE/TIME</p>
                                                        <p class="datapick_end">
                                                            <a href="javascript:;" id="meeting_end" data-type="datetime" data-pk="1" data-url="/post" data-placement="right" title="Set date & time">
                                                                <?php echo e($Draw->end_date); ?>

                                                            </a>
                                                        </p>
                                                        <input type="hidden" id="end_date" name="end_date">

                                                        <div class="tD_bet_body">
                                                            <p class="tD_bet_title">3D BET</p><hr>
                                                            <div class="col-md-5" style="padding-left: 0px">
                                                                <p>COST</p>
                                                                <p>
                                                                    <input type="text" id="tD_bet_cost" name="tD_bet_cost" class="col-md-12 form-control cost" value="<?php echo e($Draw->tDticketCost); ?>">
                                                                    <label class="price_unit" style="padding-top: 3px">₹</label>
                                                                </p>
                                                            </div>
                                                            
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>                                                                  
                                                                   
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>                                                                    
                                                                    
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>
                                                                    
                                                                </p>

                                                            </div>                                                    

                                                            <div class="row win_prize tD_bet_win_prize">
                                                                <p>WINNING PRIZE</p>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>1 ODD</label>
                                                                        <label class="price_unit">₹</label>
                                                                        <input type="text" id="tD_bet_prize_one" name="tD_bet_prize_one" class="col-md-12 form-control"  value="<?php echo e($Draw->tDprizeOne); ?>">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>2 ODD</label>
                                                                        <label class="price_unit">₹</label>
                                                                        <input type="text" id="tD_bet_prize_two" name="tD_bet_prize_two" class="col-md-12 form-control"  value="<?php echo e($Draw->tDprizeTwo); ?>">

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>3 ODD</label>
                                                                        <label class="price_unit">₹</label>
                                                                        <input type="text" id="tD_bet_prize_thr" name="tD_bet_prize_thr" class="col-md-12 form-control"  value="<?php echo e($Draw->tDprizeThr); ?>">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="tD_bet_body">
                                                            <p class="tD_bet_title">2D BET</p><hr>
                                                            <div class="col-md-5" style="padding-left: 0px">
                                                                <p>COST</p>
                                                                <p>
                                                                    <input type="text" id="sD_bet_cost" name="sD_bet_cost" class="col-md-12 form-control cost" value="<?php echo e($Draw->sDticketCost); ?>">
                                                                    <label class="price_unit" style="padding-top: 3px">₹</label>
                                                                </p>
                                                            </div>
                                                            <!-- <p class="board_title">BOARD NUMBERS</p> -->
                                                            <div class="col-md-1 div_board div_board_first" style="padding-right: 0px">
                                                                <p>
                                                                    <!-- <select class="form-control" name="sD_bet_board_a">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->sDboardC): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>
                                                                   <!--  <select class="form-control" name="sD_bet_board_b">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->sDboardB): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>
                                                                   <!--  <select class="form-control" name="sD_bet_board_c">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->sDboardA): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>

                                                            <!-- <div class="board_abc">
                                                                <p>A</p>
                                                                <p>B</p>
                                                                <p>C</p>
                                                            </div> -->

                                                            <div class="row win_prize tD_bet_win_prize">
                                                                <p>WINNING PRIZE</p>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>1 ODD</label>
                                                                        <label class="price_unit">₹</label>
                                                                        <input type="text" id="sD_bet_prize_one" name="sD_bet_prize_one" class="col-md-12 form-control" value="<?php echo e($Draw->sDprizeOne); ?>">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="tD_bet_body">
                                                            <p class="tD_bet_title">1D BET</p><hr>
                                                            <div class="col-md-5" style="padding-left: 0px">
                                                                <p>COST</p>
                                                                <p>
                                                                    <input type="text" id="fD_bet_cost" name="fD_bet_cost" class="col-md-12 form-control cost" value="<?php echo e($Draw->fDticketCost); ?>">
                                                                    <label class="price_unit" style="padding-top: 3px">₹</label>
                                                                </p>
                                                            </div>
                                                            <!-- <p class="board_title">BOARD NUMBERS</p> -->
                                                            <div class="col-md-1 div_board div_board_first" style="padding-right: 0px">
                                                                <p>
                                                                    <!-- <select class="form-control" name="fD_bet_board_a">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->fDboardC): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>
                                                                   <!--  <select class="form-control" name="fD_bet_board_b">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->fDboardB): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>
                                                            <div class="col-md-1 div_board" style="padding-right: 0px">
                                                                <p>
                                                                    <!-- <select class="form-control" name="fD_bet_board_c">
                                                                        <?php for($i=0;$i<10;$i++): ?>
                                                                            <?php if($i == $Draw->fDboardA): ?>
                                                                                <option selected><?php echo e($i); ?></option>
                                                                            <?php else: ?>
                                                                                <option><?php echo e($i); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </select> -->
                                                                    
                                                                </p>

                                                            </div>

                                                           <!--  <div class="board_abc">
                                                                <p>A</p>
                                                                <p>B</p>
                                                                <p>C</p>
                                                            </div>
 -->
                                                            <div class="row win_prize tD_bet_win_prize">
                                                                <p>WINNING PRIZE</p>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label>1 ODD</label>
                                                                        <label class="price_unit">₹</label>
                                                                        <input type="text" id="fD_bet_prize_one" name="fD_bet_prize_one" class="col-md-12 form-control" value="<?php echo e($Draw->fDprizeOne); ?>">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="save_edit" class="btn green">Save Change</button>
                                        <button type="button" id="reset" class="btn green">Cancel</button>
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
        $(document).ready(function() {
            $('#save_edit').on('click', function () {
                $('#start_date').val($('#meeting_start').text());

                $('#end_date').val($('#meeting_end').text());

                var tD_bet_cost = $('#tD_bet_cost').val();
                var sD_bet_cost = $('#sD_bet_cost').val();
                var fD_bet_cost = $('#fD_bet_cost').val();

                var tD_bet_prize_one = $('#tD_bet_prize_one').val();
                var tD_bet_prize_two = $('#tD_bet_prize_two').val();
                var tD_bet_prize_thr = $('#tD_bet_prize_thr').val();

                var sD_bet_prize_one = $('#sD_bet_prize_one').val();

                var fD_bet_prize_one = $('#fD_bet_prize_one').val();

                if ((tD_bet_cost.length == 0) || (tD_bet_prize_one.length == 0) || (tD_bet_prize_two.length == 0) || (tD_bet_prize_thr.length == 0)) {
                    toastr["warning"]("Input the all info for 3D BET correctly", "Notifications");
                    return;
                }

                if ((sD_bet_cost.length == 0) || (sD_bet_prize_one.length == 0)) {
                    toastr["warning"]("Input the all info 2D BET correctly", "Notifications");
                    return;
                }

                if ((fD_bet_cost.length == 0) || (fD_bet_prize_one.length == 0) ) {
                    toastr["warning"]("Input the all info 1D BET correctly", "Notifications");
                    return;
                }

                $('.form').submit();

            })
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>