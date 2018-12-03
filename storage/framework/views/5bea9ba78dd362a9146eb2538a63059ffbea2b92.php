<!doctype html>
<html class="no-js" lang="en">

<head>
	<link rel="icon" href="favicon.png" sizes="64x64" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>3Dlottery.in - 3DLottery is an wonderful lottery system</title>
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
    <link href="<?php echo e(asset('DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css">
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

    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">

    <!-- modernizr css -->
    <script src="<?php echo e(asset('js/vendor/modernizr-2.8.3.min.js')); ?>"></script>

</head>

<body>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- preloader Start -->


    <!--Header area start here-->
    <?php echo $__env->make('front.Header.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--About area start here-->
    <?php echo $__env->make('front.About.about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--3D Lottery Result here-->
    <?php echo $__env->make('front.Results.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--Footer area start here-->
    <?php echo $__env->make('front.Footer.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--Footer area end here-->
<!-- all js here -->
<!-- jquery latest version -->
<script src="<?php echo e(asset('js/vendor/jquery-3.2.1.min.js')); ?>"></script>
<!-- tether js -->
<script src="<?php echo e(asset('js/tether.min.js')); ?>"></script>
<!-- bootstrap js -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')); ?>"></script>
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

<script src="<?php echo e(asset('datatable/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatable/dataTables.bootstrap.js')); ?>"></script>

<script src="<?php echo e(asset('datatable/table-managed.js')); ?>"></script>

<script>
    jQuery(document).ready(function() {
        TableManaged.init();
    });
</script>

<script>
    $(document).ready(function() {

        var otable = $('#example').DataTable({
            ajax: "<?php echo e(asset('result/0')); ?>",
            "bFilter": false,
            "bInfo": false,
            'columnDefs': [{
                "targets": [1,2,3],
                "orderable": false
            }],
            "order": [[0, 'desc']],
            columns: [
                {data: "id"},
                {data: "end_date","render": function ( data, type, row, meta ) {
                        fullDate = data.split(' ');

                        var date = fullDate[0].split(/\//);
                        var time = fullDate[1];

                        var newDate = date[1] + '/' + date[0] + '/' + date[2] + ' ' + time;
                        var k = new Date(newDate);
                        return k.toLocaleDateString();
                    }
                },
                {data: "end_date","render": function ( data, type, row, meta ) {

                        fullDate = data.split(' ');

                        var date = fullDate[0].split(/\//);
                        var time = fullDate[1];

                        var newDate = date[1] + '/' + date[0] + '/' + date[2] + ' ' + time;
                        var k = new Date(newDate);
                        return k.toLocaleTimeString();
                    }
                },
                {data: "tDboardA","render": function ( data, type, row, meta ) {
                        return row.tDboardA + " " + row.tDboardB + " " + row.tDboardC
                    }
                },
            ],
            select: true
        });

        setInterval( function () {
            otable.ajax.reload();
        }, 15000 );

        var prime_otable = $('#prime_example').DataTable({
            ajax: "<?php echo e(asset('result/1')); ?>",
            "bFilter": false,
            "bInfo": false,
            'columnDefs': [{
                "targets": [1,2,3],
                "orderable": false
            }],
            "order": [[0, 'desc']],
            columns: [
                {data: "id"},
                {data: "end_date","render": function ( data, type, row, meta ) {
                        fullDate = data.split(' ');

                        var date = fullDate[0].split(/\//);
                        var time = fullDate[1];

                        var newDate = date[1] + '/' + date[0] + '/' + date[2] + ' ' + time;
                        var k = new Date(newDate);
                        return k.toLocaleDateString();
                    }
                },
                {data: "end_date","render": function ( data, type, row, meta ) {

                        fullDate = data.split(' ');

                        var date = fullDate[0].split(/\//);
                        var time = fullDate[1];

                        var newDate = date[1] + '/' + date[0] + '/' + date[2] + ' ' + time;
                        var k = new Date(newDate);
                        return k.toLocaleTimeString();
                    }
                },
                {data: "winningNum"},
                
                        
                        
                    
                
            ],
            select: true
        });

        setInterval( function () {
            prime_otable.ajax.reload();
        }, 15000 );
    });
</script>
</body>

</html>