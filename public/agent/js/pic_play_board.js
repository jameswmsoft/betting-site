
$(document).ready(function() {
    $('#create').on('click', function () {
        $('#start_date').val($('#meeting_start').text());

        $('#end_date').val($('#meeting_end').text());

        var cost = $('#cost').val();
        var prize_one = $('#prize_one').val();
        var prize_two = $('#prize_two').val();
        var prize_thr = $('#prize_thr').val();
        var prize_for = $('#prize_for').val();

        var boardA = $('.board_e').val();
        var boardB = $('.board_d').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_a').val();

        if ((cost.length == 0) || (prize_one.length == 0) || (prize_two.length == 0) || (prize_for.length == 0) || (prize_thr.length == 0)
            || (boardA.length == 0) || (boardB.length == 0) || (boardC.length == 0) || (boardD.length == 0) || (boardE.length == 0)) {
            toastr["warning"]("Input the all info correctly", "Notifications");
            return;
        } else {
            $('.form').submit();
        }
    });

    $('#edit_save').on('click', function () {
        $('#start_date').val($('#meeting_start').text());

        $('#end_date').val($('#meeting_end').text());

        var cost = $('#cost').val();
        var prize_one = $('#prize_one').val();
        var prize_two = $('#prize_two').val();
        var prize_thr = $('#prize_thr').val();
        var prize_for = $('#prize_for').val();

        var boardA = $('.board_e').val();
        var boardB = $('.board_d').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_a').val();

        if ((cost.length == 0) || (prize_one.length == 0) || (prize_two.length == 0) || (prize_for.length == 0) || (prize_thr.length == 0)
            || (boardA.length == 0) || (boardB.length == 0) || (boardC.length == 0) || (boardD.length == 0) || (boardE.length == 0)) {
            toastr["warning"]("Input the all info correctly", "Notifications");
            return;
        } else {
            $('.form').submit();
        }
    });

    $('select.board_e').on('change',function () {
        var boardB = $('.board_d').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_a').val();

        var selectNum = this.value;
        if(selectNum == ''){selectNum = 10}
        var boardArray = [boardB,boardC,boardD,boardE];

        for(i=0;i<4;i++){
            if(boardArray[i] == selectNum){
                toastr["warning"]("Select the other board number", "Notifications");
                $('.board_e').val('');
            }
        }
    })
    $('select.board_d').on('change',function () {
        var boardB = $('.board_e').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_a').val();

        var selectNum = this.value;
        if(selectNum == ''){selectNum = 10}
        var boardArray = [boardB,boardC,boardD,boardE];

        for(i=0;i<4;i++){
            if(boardArray[i] == selectNum){
                toastr["warning"]("Select the other board number", "Notifications");
                $('.board_d').val('');
            }
        }
    })
    $('select.board_c').on('change',function () {
        var boardB = $('.board_d').val();
        var boardC = $('.board_e').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_a').val();

        var selectNum = this.value;
        if(selectNum == ''){selectNum = 10}
        var boardArray = [boardB,boardC,boardD,boardE];

        for(i=0;i<4;i++){
            if(boardArray[i] == selectNum){
                toastr["warning"]("Select the other board number", "Notifications");
                $('.board_c').val('');
            }
        }
    })
    $('select.board_b').on('change',function () {
        var boardB = $('.board_d').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_e').val();
        var boardE = $('.board_a').val();

        var selectNum = this.value;
        if(selectNum == ''){selectNum = 10}
        var boardArray = [boardB,boardC,boardD,boardE];

        for(i=0;i<4;i++){
            if(boardArray[i] == selectNum){
                toastr["warning"]("Select the other board number", "Notifications");
                $('.board_b').val('');
            }
        }
    })
    $('select.board_a').on('change',function () {
        var boardB = $('.board_d').val();
        var boardC = $('.board_c').val();
        var boardD = $('.board_b').val();
        var boardE = $('.board_e').val();

        var selectNum = this.value;
        if(selectNum == ''){selectNum = 10}
        var boardArray = [boardB,boardC,boardD,boardE];

        for(i=0;i<4;i++){
            if(boardArray[i] == selectNum){
                toastr["warning"]("Select the other board number", "Notifications");
                $('.board_a').val('');
            }
        }
    })
});