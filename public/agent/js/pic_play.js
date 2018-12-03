
var s = 0;
$(document).ready(function() {
    $('.tDLot .tD_tdbet').on('click', function () {
        $('#tdbet').css({'display': 'inherit'});
        $('#sdbet').css({'display': 'none'});
        $('#fdbet').css({'display': 'none'});

        $('div.tD_main').css({'background': '#50b07d'});
    })
    $('.tDLot .tD_sdbet').on('click', function () {
        $('#tdbet').css({'display': 'none'});
        $('#sdbet').css({'display': 'inherit'});
        $('#fdbet').css({'display': 'none'});

        $('div.tD_main').css({'background': '#c511b9'});
    })
    $('.tDLot .tD_fdbet').on('click', function () {
        $('#tdbet').css({'display': 'none'});
        $('#sdbet').css({'display': 'none'});
        $('#fdbet').css({'display': 'inherit'});

        $('div.tD_main').css({'background': '#a5bc19'});
    })

    $('.sname').keyup(function () {

        var a = $('.aname').val();
        var b = $('.bname').val();
        var c = $('.cname').val();
        var d = $('.dname').val();
        var e = $('.ename').val();
        var sname = $('.sname').val();

        if (sname == ''){
            sname = 1;
        }

        var s = 0;

        if ($('.aname').hasClass('selected-option')) {
            s++;
        }
        if ($('.bname').hasClass('selected-option')) {
            s++;
        }
        if ($('.cname').hasClass('selected-option')) {
            s++;
        }
        if ($('.dname').hasClass('selected-option')) {
            s++;
        }
        if ($('.ename').hasClass('selected-option')) {
            s++;
        }

        var cost = $('#pic_cost').text();

        if(s == 1){

            var prize = $('#pic_prizeOne').text();

            document.getElementById("pic_prize").innerHTML =  prize * sname ;

            $('#pic_total_prize').val(prize * sname);

        }

        if(s == 2){

            var prize = $('#pic_prizeTwo').text();

            document.getElementById("pic_prize").innerHTML = prize * sname ;

            $('#pic_total_prize').val(prize * sname);

        }

        if(s == 3){

            var prize = $('#pic_prizeThr').text();

            document.getElementById("pic_prize").innerHTML = prize * sname ;

            $('#pic_total_prize').val(prize * sname);

        }

        if(s == 4){

            var prize = $('#pic_prizeFor').text();

            document.getElementById("pic_prize").innerHTML = prize * sname ;

            $('#pic_total_prize').val(prize * sname);

        }

        document.getElementById("total_pic_cost").innerHTML = cost * sname ;

        $('#input_total_cost').val(cost * sname);

    });

    var buy = 0;

    $('input').on('click', function () {

        buy = 0;

        var id = this.id;
        var a = $('.aname').val();
        var b = $('.bname').val();
        var c = $('.cname').val();
        var d = $('.dname').val();
        var e = $('.ename').val();

        if(id == 'aname'){
            if ($('.aname').hasClass('selected-option')){
                s--;
                $('.aname').css({'background':'#48ba6b','color':'green'});
                $('.aname').removeClass('selected-option');
                $('#a_pic_bot').removeClass('pic_bot');
                $('#bet_aname').val('');
            }else {
                s++;
                $('.aname').css({'background':'#ecea2c','color':'red'});
                $('.aname').addClass('selected-option');
                $('#a_pic_bot').addClass('pic_bot');
                $('#bet_aname').val(a);
            }
        }
        if(id == 'bname'){
            if ($('.bname').hasClass('selected-option')){
                s--;
                $('.bname').css({'background':'#48ba6b','color':'green'});
                $('.bname').removeClass('selected-option');
                $('#b_pic_bot').removeClass('pic_bot');
                $('#bet_bname').val('');
            }else {
                s++;
                $('.bname').css({'background':'#ecea2c','color':'red'});
                $('.bname').addClass('selected-option');
                $('#b_pic_bot').addClass('pic_bot');
                $('#bet_bname').val(b);
            }
        }
        if(id == 'cname'){
            if ($('.cname').hasClass('selected-option')){
                s--;
                $('.cname').css({'background':'#48ba6b','color':'green'});
                $('.cname').removeClass('selected-option');
                $('#c_pic_bot').removeClass('pic_bot');
                $('#bet_cname').val('');
            }else {
                s++;
                $('.cname').css({'background':'#ecea2c','color':'red'});
                $('.cname').addClass('selected-option');
                $('#c_pic_bot').addClass('pic_bot');
                $('#bet_cname').val(c);
            }
        }
        if(id == 'dname'){
            if ($('.dname').hasClass('selected-option')){
                s--;
                $('.dname').css({'background':'#48ba6b','color':'green'});
                $('.dname').removeClass('selected-option');
                $('#d_pic_bot').removeClass('pic_bot');
                $('#bet_dname').val('');
            }else {
                s++;
                $('.dname').css({'background':'#ecea2c','color':'red'});
                $('.dname').addClass('selected-option');
                $('#d_pic_bot').addClass('pic_bot');
                $('#bet_dname').val(d);
            }
        }
        if(id == 'ename'){
            if ($('.ename').hasClass('selected-option')){
                s--;
                $('.ename').css({'background':'#48ba6b','color':'green'});
                $('.ename').removeClass('selected-option');
                $('#e_pic_bot').removeClass('pic_bot');
                $('#bet_ename').val('');
            }else {
                s++;
                $('.ename').css({'background':'#ecea2c','color':'red'});
                $('.ename').addClass('selected-option');
                $('#e_pic_bot').addClass('pic_bot');
                $('#bet_ename').val(e);
            }
        }

        var sname = $('.sname').val();

        if (sname == ''){
            sname = 1;
        }

        if(s == 0){

            document.getElementById("pic_prize").innerHTML =  '0' ;
            $('#pic_total_prize').val('0');

        }

        if(s == 1){

            var cost = $('#pic_prizeOne').text();

            document.getElementById("pic_prize").innerHTML =  cost * sname ;
            $('#pic_total_prize').val(cost * sname);

        }

        if(s == 2){

            var cost = $('#pic_prizeTwo').text();

            document.getElementById("pic_prize").innerHTML = cost * sname ;
            $('#pic_total_prize').val(cost * sname);

        }

        if(s == 3){

            var cost = $('#pic_prizeThr').text();

            document.getElementById("pic_prize").innerHTML = cost * sname ;
            $('#pic_total_prize').val(cost * sname);

        }

        if(s == 4){

            var cost = $('#pic_prizeFor').text();

            document.getElementById("pic_prize").innerHTML = cost * sname ;
            $('#pic_total_prize').val(cost * sname);

        }


        if (s == 5) {
            buy = 1;
            toastr["error"]("You can't select all 5 options.", "Notifications");
        }

    });

    $('.pic_confirm').on('click', function () {

        var a = $('.aname').val();
        var b = $('.bname').val();
        var c = $('.cname').val();
        var d = $('.dname').val();
        var e = $('.ename').val();
        var sname = $('.sname').val();

        if ((sname.length == 0)) {
            toastr["error"]("Please input the Times.", "Notifications");
            return;
        }

        if ((s == 0)) {
            toastr["error"]("Select the options.", "Notifications");
            return;
        }

        if (buy == 0) {
            $('.form').submit();
        }else {
            toastr["warning"]("You can't buy ticket.", "Notifications");
        }
    });

});
