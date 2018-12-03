
<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        <?php if(Session::get('deposit')): ?>{
            toastr["success"]("Successfully deposit", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('withdrawerror')): ?>{
            toastr["error"]("You don't have payment", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('withdrawsuccess')): ?>{
            toastr["success"]("Successfully withdraw", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('profilepasserror')): ?>{
            toastr["error"]("Input the Old-password correctly", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('profilesuccess')): ?>{
            toastr["success"]("Successfully Saved", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('tdlotpayerror')): ?>{
            toastr["error"]("Don't you buy it.See your deposit!", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('tdlotpaysuccess')): ?>{
            toastr["success"]("Successfully buyed", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('savedraw')): ?>{
            toastr["success"]("Successfully saved", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('saveagent')): ?>{
            toastr["success"]("Successfully saved", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('delagent')): ?>{
            toastr["success"]("Successfully deleted", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('buypic')): ?>{
            toastr["success"]("Successfully bought the ticket", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('buypicright')): ?>{
            toastr["success"]("Congratulation!!! Your Lottery is right.", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('buypicwrong')): ?>{
            toastr["error"]("Try again. Your Lottery is wrong.", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('allowdeposit')): ?>{
            toastr["success"]("Successfully", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('success')): ?>{
            toastr["success"]("Successfully", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('notdeposit')): ?>{
            toastr["error"]("You have not any deposit.", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('pendingdeposit')): ?>{
            toastr["error"]("Your deposit is pending now.", "Notifications");
        }<?php endif; ?>

        <?php if(Session::get('exceeddeposit')): ?>{
            toastr["error"]("You don't have enough deposit for buy.", "Notifications");
        }<?php endif; ?>
    });
</script>