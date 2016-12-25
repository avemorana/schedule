$(document).ready(function () {
    $(".error").hide();

    $("#done").click(function () {
        $(".error").hide();
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var error_name = "";
        var error_email = "";
        var error_message = null;
        var error = false;

        if (name.length == 0) {
            error_name = "Please, enter name";
            $("#nameError").html(error_name);
            $("#nameError").show();
            error = true;
        }

        if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) {
            error_email = "Please, enter correct email";
            $("#emailError").html(error_email);
            $("#emailError").show();
            error = true;
        }

        if (message.length == 0) {
            error_message = "Please, enter message";
            $("#messageError").html(error_message);
            $("#messageError").show();
            error = true;
        }
        if (error) {
            return false;
        }
    });
});