
$(document).ready(function() {

    $('#save').on('click',function () {

        var username = $('#username').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var cu_pass = $('#c_pass').val();
        var new_pass = $('#new_pass').val();
        var re_pass = $('#re_pass').val();

        if ((username.length == 0) || (firstname.length == 0) || (lastname.length == 0)|| (email.length == 0) || (phone.length == 0)){
            toastr["warning"]("please input the profile", "Notifications");
            return;
        }else {
            if ((cu_pass.length != 0) || (new_pass.length != 0) || (re_pass.length != 0)){

                if ((cu_pass.length == 0) || (new_pass.length == 0) || (re_pass.length == 0)){
                    return;
                }else {
                    if (new_pass == re_pass) {
                        $('.form').submit();
                    }else {
                        toastr["warning"]("please input the Re-password correctly", "Notifications");
                        return;
                    }
                }

            }else {
                $('.form').submit();
            }
        }
    })
});