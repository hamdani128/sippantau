var url = "http://localhost/sippantau";

$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bx-hide");
            $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bx-hide");
            $('#show_hide_password i').addClass("bx-show");
        }
    });
});


function registerlab() {
    window.location.href = "/registrasi_perusahaan";
}

function back_to_login() {
    window.location.href = "/auth/login";
}

function login_administrator() {
    var username = $('#username').val();
    var password = $('#password').val();
    if (username == '' || password == '') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill all fields',
            type: 'error',
            confirmButtonText: 'Ok'
        });
    } else {
        $.ajax({
            url: "/auth/check_login",
            method: "POST",
            data: {
                username: username,
                password: password
            },
            dataType: "json",
            success: function (data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Login Successful',
                        type: 'success',
                        confirmButtonText: 'Ok'
                    });
                    document.location.href = "/";
                }
            },
            error: function (data) {
                if (data.status == 'Users Not Found') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Username Not Found',
                        type: 'error',
                        confirmButtonText: 'Ok'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Login Failed',
                        type: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            }
        });
    }

}