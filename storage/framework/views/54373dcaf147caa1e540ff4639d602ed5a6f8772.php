<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>3dlottery.in - 3dlottery is an wonderful lottery system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>">
    <link href="<?php echo e(asset('datatable/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/meanmenu.min.css')); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <!-- bxslider css -->
    <!--flaticon css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <link href="<?php echo e(asset('css/video-js.css')); ?>" rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- Lottery css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/viewcart.css')); ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <!-- modernizr css -->
    <script src="<?php echo e(asset('js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
</head>

<body>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- preloader Start -->
<div id="preloader">
    <div id="status"><img src="<?php echo e(asset('images/banner/loader.gif')); ?>" id="preloader_image" alt="loader">
    </div>
</div>

<div class="container v_cart">
    <h2>WINNERS LIST</h2>
        <table class="table table-striped table-bordered table-hover table-dark" id="sample_2">
            <thead>
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Username
                </th>
                <th>
                    BetType
                </th>
                <th>
                    Winning Number
                </th>
                <th>
                    Winning Prize
                </th>
                <th>
                    TicketID
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="background-color: #10122d">
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($data->username); ?></td>
                    <td><?php echo e($data->betType); ?> ODD</td>
                    <td>
                        <div>
                            <label>A</label>
                            <label>B</label>
                            <label>C</label>
                        </div>
                        <label><?php echo e($data->boardA); ?></label>
                        <label><?php echo e($data->boardB); ?></label>
                        <label><?php echo e($data->boardC); ?></label>
                    </td>
                    <td><?php echo e($data->winningPrize); ?> ₹</td>
                    <td><?php echo e($data->ticketID); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    <div class="row">
        <a href="<?php echo e(url('/index')); ?>" id="back" type="button" class="btn btn-primary">BACK</a>
    </div>
</div>

<!--Footer area end here-->
<!-- all js here -->
<!-- jquery latest version -->
<script src="<?php echo e(asset('js/vendor/jquery-3.2.1.min.js')); ?>"></script>
<!-- tether js -->
<script src="<?php echo e(asset('js/tether.min.js')); ?>"></script>
<!-- bootstrap js -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/dataTables.bootstrap.js')); ?>"></script>
<!-- owl.carousel js -->
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<!-- meanmenu js -->
<script src="<?php echo e(asset('js/jquery.meanmenu.js')); ?>"></script>
<!-- jquery-ui js -->
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<!-- easypiechart js -->
<script src="<?php echo e(asset('js/jquery.easypiechart.min.js')); ?>"></script>
<!-- particles js -->
<!-- wow js -->
<script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<!-- smooth-scroll js -->
<script src="<?php echo e(asset('js/smooth-scroll.min.js')); ?>"></script>
<!-- plugins js -->
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<!-- EChartJS JavaScript -->
<script src="<?php echo e(asset('js/echarts-en.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/echarts-liquidfill.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vc_round_chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/videojs-ie8.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/video.js')); ?>"></script>
<script src="<?php echo e(asset('js/Youtube.min.js')); ?>"></script>
<!-- main js -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/table-managed.js')); ?>"></script>
<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }
</script>

<script>
    jQuery(document).ready(function() {
        TableManaged.init();
    });
</script>
</body>

</html>