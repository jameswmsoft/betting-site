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
                                <a href="<?php echo e(url('agent/games/show_tDlot')); ?>" style="background-color: #0082ab">
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

            <section class="currency-area tDLot">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="rete-list bt_title wow  fadeInUp animated tD_body" data-wow-duration="1.0s" style="visibility: visible; animation-duration: 1.0s; animation-name: fadeInUp">
                            <?php $__currentLoopData = $NowGames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nowGame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tD_draw_title">
                                <h2>DRAW - <?php echo e($nowGame->id); ?></h2>
                                <button type="button" class="btn btn-primary" onclick="window.location='<?php echo e(url("agent/games/tD_detail")); ?>/<?php echo e($nowGame->id); ?>'">DETAILS</button>
                            </div>
                            <div class="content tD_main">
                                <div class="tD_title">
                                    <ul>
                                        <li class="tD_tdbet">

                                            <input type="radio" id="f-option" name="selector" checked>
                                            <label for="f-option">3D bet</label>

                                            <div class="check"></div>
                                        </li>

                                        <li class="tD_sdbet">
                                            <input type="radio" id="s-option" name="selector">
                                            <label for="s-option">2D bet</label>

                                            <div class="check"><div class="inside"></div></div>
                                        </li>

                                        <li class="tD_fdbet">
                                            <input type="radio" id="t-option" name="selector">
                                            <label for="t-option">1D bet</label>

                                            <div class="check"><div class="inside"></div></div>
                                        </li>
                                    </ul>

                                </div>
                                <div class="tD_content" id="tdbet">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_ipt">
                                            <form class="form tD_form" action="<?php echo e(url('agent/games/buy_tdbet')); ?>/<?php echo e($nowGame->id); ?>" method="post">
                                                <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                                <div class="form-group">
                                                    <input type="text" id="aname" class="aname" name="aname" maxlength="1">
                                                    <label>A</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="bname" class="bname" name="bname" maxlength="1">
                                                    <label>B</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="cname" class="cname" name="cname" maxlength="1">
                                                    <label>C</label>
                                                </div>
                                                <div class="form-group mul_opt">
                                                    <span>×</span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" pattern= "[0-9]" class="sname" id="sname" name="sname">
                                                    <label class="tD_times">times</label>
                                                </div>
                                                <input type="hidden" class="totalCost" name="totalCost">
                                                <input type="hidden" name="role" value="3">
                                            </form>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_cost">
                                            <div class="form-group eq_cost">
                                                <label>COST : <span id="total_tD_cost"><?php echo e($nowGame->tDticketCost); ?></span> ₹</label>
                                                <label id="tD_cost" style="display: none"><?php echo e($nowGame->tDticketCost); ?></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row tD_addbtn">
                                                    <button type="button" class="btn btn-primary btn-block tD_add_chart">BUY</button>
                                                    <button type="button" class="btn btn-danger btn-block tD_add_qbuy">RESET</button>
                                                </div>
                                            </div>
                                            
                                                
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tD_content" id="sdbet" style="display: none">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_ipt">
                                            <div class="tD_sd_type">
                                                <ul>
                                                    <li class="tD_sd_tdbet">
                                                        <input type="radio" id="sd-f-option" name="sd_selector" checked>
                                                        <label for="sd-f-option">AB</label>

                                                        <div class="check"></div>
                                                    </li>

                                                    <li class="tD_sd_sdbet">
                                                        <input type="radio" id="sd-s-option" name="sd_selector">
                                                        <label for="sd-s-option">AC</label>

                                                        <div class="check"><div class="inside"></div></div>
                                                    </li>

                                                    <li class="tD_sd_fdbet">
                                                        <input type="radio" id="sd-t-option" name="sd_selector">
                                                        <label for="sd-t-option">BC</label>

                                                        <div class="check"><div class="inside"></div></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form class="form sD_form" action="<?php echo e(url('agent/games/buy_tdbet')); ?>/<?php echo e($nowGame->id); ?>" method="post">
                                                <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                                <div class="form-group">
                                                    <input type="text" id="s-aname" class="aname" name="aname" maxlength="1">
                                                    <label>A</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="s-bname" class="bname" name="bname" maxlength="1">
                                                    <label>B</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="s-cname" class="cname" name="cname" maxlength="1">
                                                    <label>C</label>
                                                </div>
                                                <div class="form-group mul_opt">
                                                    <span>×</span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" pattern= "[0-9]" class="sname" id="s-sname" name="sname">
                                                    <label class="tD_times">times</label>
                                                </div>
                                                <input type="hidden" class="totalCost" name="totalCost">
                                                <input type="hidden" name="role" value="2">
                                            </form>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_cost">
                                            <div class="form-group eq_cost">
                                                <label>COST : <span id="total_sD_cost"><?php echo e($nowGame->sDticketCost); ?></span> ₹</label>
                                                <label id="sD_cost" style="display: none"><?php echo e($nowGame->sDticketCost); ?></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row tD_addbtn">
                                                    <button type="button" class="btn btn-primary btn-block tD_add_chart sd_confirm">BUY</button>
                                                    <button type="button" class="btn btn-danger btn-block tD_add_qbuy">RESET</button>
                                                </div>
                                            </div>
                                            
                                                
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tD_content" id="fdbet" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_ipt">
                                            <div class="tD_sd_type">
                                                <ul>
                                                    <li class="tD_sd_tdbet">
                                                        <input type="radio" id="fd-f-option" name="fd_selector" checked>
                                                        <label for="fd-f-option">A</label>

                                                        <div class="check"></div>
                                                    </li>

                                                    <li class="tD_sd_sdbet">
                                                        <input type="radio" id="fd-s-option" name="fd_selector">
                                                        <label for="fd-s-option">B</label>

                                                        <div class="check"><div class="inside"></div></div>
                                                    </li>

                                                    <li class="tD_sd_fdbet">
                                                        <input type="radio" id="fd-t-option" name="fd_selector">
                                                        <label for="fd-t-option">C</label>

                                                        <div class="check"><div class="inside"></div></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form class="form fD_form" action="<?php echo e(url('agent/games/buy_tdbet')); ?>/<?php echo e($nowGame->id); ?>" method="post">
                                                <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                                <div class="form-group">
                                                    <input type="text" id="f-aname" class="aname" name="aname" maxlength="1">
                                                    <label>A</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="f-bname" class="bname" name="bname" maxlength="1">
                                                    <label>B</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="f-cname" class="cname" name="cname" maxlength="1">
                                                    <label>C</label>
                                                </div>
                                                <div class="form-group mul_opt">
                                                    <span>×</span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="sname" id="f-sname" name="sname">
                                                    <label class="tD_times">times</label>
                                                </div>
                                                <input type="hidden" class="totalCost" name="totalCost">
                                                <input type="hidden" name="role" value="1">
                                            </form>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tD_ct_cost">
                                            <div class="form-group eq_cost">
                                                <label>COST : <span id="total_fD_cost"><?php echo e($nowGame->fDticketCost); ?></span> ₹</label>
                                                <label id="fD_cost" style="display: none"><?php echo e($nowGame->fDticketCost); ?></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row tD_addbtn">
                                                    <button type="button" class="btn btn-primary btn-block tD_add_chart">BUY</button>
                                                    <button type="button" class="btn btn-danger btn-block tD_add_qbuy">RESET</button>
                                                </div>
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

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('agent/js/validate_form.js')); ?>"></script>
    <script src="<?php echo e(asset('agent/js/tdbet.js')); ?>"></script>
<script>
$('.tD_add_chart').on('click',function () {


    if ($('#f-option').is(':checked')) {

        var a = $('#aname').val();
        var b = $('#bname').val();
        var c = $('#cname').val();
        var sname = $('#sname').val();


        if ((a.length == 0) || (b.length == 0) || (c.length == 0) || (sname.length == 0) || (sname == 0)) {
            toastr["error"]("Select the options.", "Notifications");
            return;
        }else {
            $('.tD_form').submit();
        }
    }

    if ($('#s-option').is(':checked')) {

        var ssname = $('#s-sname').val();

        if ($('#sd-f-option').is(':checked')) {

            var sa = $('#s-aname').val();
            var sb = $('#s-bname').val();

            if ((sa.length == 0) || (sb.length == 0) || (ssname.length == 0) || (ssname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.sD_form').submit();
            }
        }

        if ($('#sd-s-option').is(':checked')) {

            var sa = $('#s-aname').val();
            var sc = $('#s-cname').val();

            if ((sa.length == 0) || (sc.length == 0) || (ssname.length == 0) || (ssname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.sD_form').submit();
            }
        }

        if ($('#sd-t-option').is(':checked')) {

            var sc = $('#s-cname').val();
            var sb = $('#s-bname').val();

            if ((sc.length == 0) || (sb.length == 0) || (ssname.length == 0)|| (ssname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.sD_form').submit();
            }
        }
    }

    if ($('#t-option').is(':checked')) {

        var fsname = $('#f-sname').val();

        if ($('#fd-f-option').is(':checked')) {

            var fa = $('#f-aname').val();

            if ((fa.length == 0) || (fsname.length == 0) || (fsname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.fD_form').submit();
            }
        }

        if ($('#fd-s-option').is(':checked')) {

            var fb = $('#f-bname').val();

            if ((fb.length == 0) || (fsname.length == 0) || (fsname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.fD_form').submit();
            }
        }

        if ($('#fd-t-option').is(':checked')) {

            var fc = $('#f-cname').val();

            if ((fc.length == 0) || (fsname.length == 0) || (fsname == 0)) {
                toastr["error"]("Select the options.", "Notifications");
                return;
            }else {
                $('.fD_form').submit();
            }
        }
    }

});

setInterval(autoRefreshPage, 3000);

function autoRefreshPage()
{

    $.ajax({
        url: "<?php echo e(url('/agent/games/auto_tDlot_refresh')); ?>/<?php echo e($nowGame->id); ?>",
        method: 'get',

        success: function(result){

            if(result == '1'){
                window.location.href = "<?php echo e(url('/agent/games/show_tDlot')); ?>";
            }
        }});
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Agent.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>