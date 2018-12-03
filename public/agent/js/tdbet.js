$('.tDLot .tD_tdbet').on('click',function () {
    $('#tdbet').css({'display':'inherit'});
    $('#sdbet').css({'display':'none'});
    $('#fdbet').css({'display':'none'});

    $('div.tD_main').css({'background':'#50b07d'});
})
$('.tDLot .tD_sdbet').on('click',function () {
    $('#tdbet').css({'display':'none'});
    $('#sdbet').css({'display':'inherit'});
    $('#fdbet').css({'display':'none'});

    $('div.tD_main').css({'background':'#c511b9'});
    $('#s-cname').css({'background':'#099e86'});
    $('#s-cname').attr({'disabled':'disabled'});
})
$('.tDLot .tD_fdbet').on('click',function () {
    $('#tdbet').css({'display':'none'});
    $('#sdbet').css({'display':'none'});
    $('#fdbet').css({'display':'inherit'});

    $('div.tD_main').css({'background':'#a5bc19'});
})


$('#sd-f-option').click(function() {

    $('#s-cname').val('');
    if ($(this).is(':checked')) {
        $('#s-cname').css({'background':'#099e86'});
        $('#s-cname').attr({'disabled':'disabled'});

        $('#s-bname').css({'background':'#ffffff'});
        $('#s-bname').removeAttr('disabled');

        $('#s-aname').css({'background':'#ffffff'});
        $('#s-aname').removeAttr('disabled');
    }
});
$('#sd-s-option').click(function() {
    $('#s-bname').val('');
    if ($(this).is(':checked')) {
        $('#s-bname').css({'background':'#099e86'});
        $('#s-bname').attr({'disabled':'disabled'});

        $('#s-cname').css({'background':'#ffffff'});
        $('#s-cname').removeAttr('disabled');

        $('#s-aname').css({'background':'#ffffff'});
        $('#s-aname').removeAttr('disabled');
    }
});
$('#sd-t-option').click(function() {
    $('#s-aname').val('');
    if ($(this).is(':checked')) {
        $('#s-aname').css({'background':'#099e86'});
        $('#s-aname').attr({'disabled':'disabled'});

        $('#s-bname').css({'background':'#ffffff'});
        $('#s-bname').removeAttr('disabled');

        $('#s-cname').css({'background':'#ffffff'});
        $('#s-cname').removeAttr('disabled');
    }
});


$('#f-cname').css({'background':'#099e86'});
$('#f-cname').attr({'disabled':'disabled'});

$('#f-bname').css({'background':'#099e86'});
$('#f-bname').attr({'disabled':'disabled'});


$('#fd-f-option').click(function() {
    $('#f-cname').val('');
    $('#f-bname').val('');
    if ($(this).is(':checked')) {
        $('#f-cname').css({'background':'#099e86'});
        $('#f-cname').attr({'disabled':'disabled'});

        $('#f-bname').css({'background':'#099e86'});
        $('#f-bname').attr({'disabled':'disabled'});

        $('#f-aname').css({'background':'#ffffff'});
        $('#f-aname').removeAttr('disabled');
    }
});
$('#fd-s-option').click(function() {
    $('#f-aname').val('');
    $('#f-cname').val('');
    if ($(this).is(':checked')) {
        $('#f-aname').css({'background':'#099e86'});
        $('#f-aname').attr({'disabled':'disabled'});

        $('#f-bname').css({'background':'#ffffff'});
        $('#f-bname').removeAttr('disabled');

        $('#f-cname').css({'background':'#099e86'});
        $('#f-cname').attr({'disabled':'disabled'});

    }
});
$('#fd-t-option').click(function() {
    $('#f-aname').val('');
    $('#f-bname').val('');
    if ($(this).is(':checked')) {
        $('#f-bname').css({'background':'#099e86'});
        $('#f-bname').attr({'disabled':'disabled'});

        $('#f-aname').css({'background':'#099e86'});
        $('#f-aname').attr({'disabled':'disabled'});

        $('#f-cname').css({'background':'#ffffff'});
        $('#f-cname').removeAttr('disabled');
    }
});


$('.sname').keyup(function (e) {

    var sname = 0;
    if ($('#f-option').is(':checked')) {

        sname = $('#sname').val();

        var cost = $('#tD_cost').text();

        document.getElementById("total_tD_cost").innerHTML = cost * sname;

        $('.totalCost').val(cost * sname);
    }

    if ($('#s-option').is(':checked')) {

        sname = $('#s-sname').val();

        var cost = $('#sD_cost').text();

        document.getElementById("total_sD_cost").innerHTML = cost * sname;

        $('.totalCost').val(cost * sname);
    }
    if ($('#t-option').is(':checked')) {

        sname = $('#f-sname').val();

        var cost = $('#fD_cost').text();

        document.getElementById("total_fD_cost").innerHTML = cost * sname;

        $('.totalCost').val(cost * sname);
    }


    var key = e.charCode || e.keyCode || 0;
    if(e.keyCode == "8"){
        if (sname.length == 0){
            if ($("#s-cname").attr('disabled')){
                $('.bname').focus();
                return;
            }

            $('.cname').focus();
        }
    }else {
        $('.sname').focus();
    }
});

$('.aname').on('keyup',function (e) {
    var key = e.charCode || e.keyCode || 0;
    if(e.keyCode == "8"){
        $('.aname').focus();
    }else {
        if ($("#s-bname").attr('disabled')){
            $('.cname').focus();
            return;
        }

        $('.bname').focus();
    }
});

$('.bname').on('keyup',function (e) {
    var key = e.charCode || e.keyCode || 0;
    if(e.keyCode == "8"){
        $('.aname').focus();
    }else {
        if ($("#s-cname").attr('disabled')) {
            $('.sname').focus();
            return;
        }
         $('.cname').focus();
    }
});

$('.cname').on('keyup',function (e) {
    var key = e.charCode || e.keyCode || 0;
    if(e.keyCode == "8"){
        if ($("#s-bname").attr('disabled')){
            $('.aname').focus();
            return;
        }

        $('.bname').focus();
    }else {
        $('.sname').focus();
    }
});
