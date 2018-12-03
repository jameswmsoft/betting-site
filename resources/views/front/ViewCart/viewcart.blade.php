<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SkyLoto.org - skyloto is an wonderful lottery system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- bxslider css -->
    <!--flaticon css -->
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link href="{{asset('css/video-js.css')}}" rel="stylesheet">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Lottery css -->
    <link rel="stylesheet" href="{{asset('css/viewcart.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- preloader Start -->
<div id="preloader">
    <div id="status"><img src="{{asset('images/banner/loader.gif')}}" id="preloader_image" alt="loader">
    </div>
</div>

<div class="container v_cart">
    <h2>3D Bet Cart</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>No</th>
            <th>Number</th>
            <th>times</th>
            <th>Unit</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>198</td>
            <td>
                <form>
                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" id="number" value="10" />
                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                </form>
            </td>
            <td>60 $</td>
            <td>600 $</td>
            <td>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>201</td>
            <td>
                <form>
                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" id="number" value="20" />
                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                </form>
            </td>
            <td>10 $</td>
            <td>200 $</td>
            <td>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </td>
        </tr>
        <tr style="border-bottom: 1px solid white">
            <td>3</td>
            <td>139</td>
            <td>
                <form>
                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" id="number" value="30" />
                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                </form>
            </td>
            <td>30 $</td>
            <td>1200 $</td>
            <td>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="total">Total : 23456 $</div>
    </div>
    <div class="row">
        <button id="checkout" type="button" class="btn btn-danger tD_add_qbuy">Check Out</button>
    </div>
</div>

<!--Footer area end here-->
<!-- all js here -->
<!-- jquery latest version -->
<script src="{{asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- tether js -->
<script src="{{asset('js/tether.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- meanmenu js -->
<script src="{{asset('js/jquery.meanmenu.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<!-- easypiechart js -->
<script src="{{asset('js/jquery.easypiechart.min.js')}}"></script>
<!-- particles js -->
<!-- wow js -->
<script src="{{asset('js/wow.min.js')}}"></script>
<!-- smooth-scroll js -->
<script src="{{asset('js/smooth-scroll.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- EChartJS JavaScript -->
<script src="{{asset('js/echarts-en.min.js')}}"></script>
<script src="{{asset('js/echarts-liquidfill.min.js')}}"></script>
<script src="{{asset('js/vc_round_chart.min.js')}}"></script>
<script src="{{asset('js/videojs-ie8.min.js')}}"></script>
<script src="{{asset('js/video.js')}}"></script>
<script src="{{asset('js/Youtube.min.js')}}"></script>
<!-- main js -->
<script src="{{asset('js/main.js')}}"></script>
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
</body>

</html>