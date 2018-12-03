

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('agent/css/games.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('datatable/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo e(asset('css/admin/login.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('css/admin/admingame.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('css/admin/dashboard.css')); ?>" rel="stylesheet" type="text/css"/>
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
                    <li id="games">
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
                        <div class="panel panel-default">
                            <div class="panel-heading g_title g_pic_play">ADMIN MANAGEMENT</div>
                            <div class="panel-body">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs font-green-sharp"></i>
                                                            <span class="caption-subject font-green-sharp bold uppercase">ADMIN MANAGEMENT SYSTEM</span>
                                                        </div>
                                                        <div class="tools">
                                                        </div>
                                                    </div>
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
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    NO
                                                                </th>
                                                                <th>
                                                                    Username
                                                                </th>
                                                                <th>
                                                                    Full Name
                                                                </th>
                                                                <th>
                                                                    PhoneNumber
                                                                </th>
                                                                <th>
                                                                    Email
                                                                </th>
                                                                <th>
                                                                    Action
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i=1;?>
                                                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <tr>
                                                                    <td><?php echo e($i++); ?></td>
                                                                    <td><?php echo e($admin->username); ?></td>
                                                                    <td><?php echo e($admin->fullname); ?></td>
                                                                    <td><?php echo e($admin->phonenumber); ?></td>
                                                                    <td><?php echo e($admin->email); ?></td>
                                                                    <td>
                                                                        <?php if($admin->ban == '1'): ?>
                                                                            <a href="<?php echo e(url('admin/admin/do_admin_ban')); ?>/<?php echo e($admin->id); ?>" class="btn btn-primary contentDelete" type="button">Ban</a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(url('admin/admin/do_admin_active')); ?>/<?php echo e($admin->id); ?>" class="btn btn-warning contentDelete" type="button">Active</a>
                                                                        <?php endif; ?>
                                                                        <a href="<?php echo e(url('admin/admin/show_edit_admin')); ?><?php echo e('/'.$admin->id); ?>" class="btn btn-primary" type="button">Edit</a>
                                                                        <button class="btn btn-primary contentDelete" type="button" onclick="agentDel(<?php echo e($admin->id); ?>)">delete</button>
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

                    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">New Agent</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                        <form role="form" class="form" action="<?php echo e(url('admin/admin/new_admin')); ?>" method="post">
                                            <input type="hidden" name="_token" value=" <?php echo e(csrf_token()); ?>"/>
                                            <div class="row">
                                                <div class="col-md-4 user_title">
                                                    <h4>USERID : </h4>
                                                    <h4>PASSWORD : </h4>
                                                    <h4>MOBILE : </h4>
                                                </div>
                                                <div class="col-md-8">

                                                    <p>
                                                        <input type="text" id="admin_userid" name="userid" class="col-md-12 form-control">
                                                    </p>
                                                    <p>
                                                        <input type="password" id="admin_password" name="password" class="col-md-12 form-control">
                                                    </p>
                                                    <p>
                                                        <input type="text" id="admin_mobile" name="mobile" class="col-md-12 form-control">
                                                    </p>

                                                </div>

                                            </div>
                                            <div class="user_access">
                                                <h4>ADMIN ACCESS</h4>
                                                <div class="col-md-6">
                                                    <div class="portlet-body form">

                                                        <div class="form-group form-md-checkboxes">
                                                            <div class="md-checkbox-list">
                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" id="admin_checkbox1" name="check_dash" class="md-check" checked>
                                                                    <label for="checkbox1">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        DASHBOARD </label>
                                                                </div>
                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" id="admin_checkbox2" name="check_game" class="md-check" checked>
                                                                    <label for="checkbox2">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        GAME </label>
                                                                </div>
                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" id="admin_checkbox3" name="check_agent" class="md-check" checked>
                                                                    <label for="checkbox3">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>
                                                                        AGENT </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="portlet-body form">
                                                        <form role="form">
                                                            <div class="form-group form-md-checkboxes">
                                                                <div class="md-checkbox-list">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="admin_checkbox4" name="check_deposit" class="md-check" checked>
                                                                        <label for="checkbox4">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            DEPOSIT </label>
                                                                    </div>
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="admin_checkbox5" name="check_withdraw" class="md-check" checked>
                                                                        <label for="checkbox5">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            WITHDRAW </label>
                                                                    </div>
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="admin_checkbox6" name="check_admin" class="md-check" checked>
                                                                        <label for="checkbox6">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            ADMIN </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Close</button>
                                    <button type="button" class="btn green" id="admin_save">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body">
                    Are you really delete the selected Agent?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                    <a type="button" id="del_allow" class="btn blue">OK</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        function agentDel($id){
            var herf = '<?php echo e(url('/admin/admin/do_del_admin')); ?>' + '/' + $id;
            $('#basic').modal('show');
            $('#del_allow').attr('href',herf);
        }

        $(document).ready(function() {

            $('#admin_save').on('click',function () {

                var userid = $('#admin_userid').val();
                var password = $('#admin_password').val();
                var mobile = $('#admin_mobile').val();
                var check = $('#admin_checkbox1').val();

                console.log(check);
                if ((userid.length == 0) || (password.length == 0) || (mobile.length == 0)) {
                    toastr["warning"]("please input the fields", "Notifications");
                    return;
                } else {
                    $('.form').submit();
                }

            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>