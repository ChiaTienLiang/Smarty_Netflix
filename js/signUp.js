$(document).ready(function () {
    let nameRule = /^.+$/;
    let emailRule = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/;
    let passwordRule = /^[a-zA-Z0-9]{8,12}$/;
    let pwd2Check;
    /**
     * 檢查名字是否空白
     */
    $("#name").blur(function () {
        if (nameRule.test($(this).val())) {
            $("#errorName").text("");
            $("#name").css("border-color", "#265f94");
            nameCheck = true;
        } else {
            $("#errorName").text("請輸入姓名");
            $("#errorName").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#name").css("border-color", "red");
            nameCheck = false;
        }
    });

    /**
     * 檢查email是否符合正規
     */
    $("#email").blur(function () {
        if (emailRule.test($(this).val())) {
            $("#errorMail").text("");
            $("#email").css("border-color", "#265f94");
            emailCheck = true;
        } else {
            $("#errorMail").text("Email格式不符");
            $("#errorMail").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#email").css("border-color", "red");
            emailCheck = false;
        }
    });

    /**
     * 檢查password是否符合正規
     */
    $("#password").blur(function () {
        if (pwd2Check === true) {
            if (passwordRule.test($(this).val()) && ($(this).val() === $("#password2").val())) {
                $("#errorPwd").text("");
                $("#password").css("border-color", "#265f94");
                pwdCheck = true;
            } else {
                $("#errorPwd").text("與二次密碼輸入不同");
                $("#errorPwd").css({
                    color: "red",
                    "font-size": "0.8rem"
                });
                $("#password").css("border-color", "red");
                pwdCheck = false;
            }
        } else {
            if (passwordRule.test($(this).val())) {
                $("#errorPwd").text("");
                $("#password").css("border-color", "#265f94");
                pwdCheck = true;
            } else {
                $("#errorPwd").text("密碼格式不符");
                $("#errorPwd").css({
                    color: "red",
                    "font-size": "0.8rem"
                });
                $("#password").css("border-color", "red");
                pwdCheck = false;
            }
        }

    });

    /**
     * 檢查password2是否與password同
     */
    $("#password2").blur(function () {
        if (passwordRule.test($(this).val()) && ($(this).val() === $("#password").val())) {
            $("#errorPwd2").text("");
            $("#password2").css("border-color", "#265f94");
            pwd2Check = true;
        } else {
            $("#errorPwd2").text("與密碼輸入不同");
            $("#errorPwd2").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#password2").css("border-color", "red");
            pwd2Check = false;
        }
    });

    $("#signUp").click(function () {
        if (nameCheck && emailCheck && pwdCheck && pwd2Check) {
            $.ajax({
                type: "POST",
                url: "../MemberContro.php",
                data: {
                    todo: 'signUp',
                    name: $("#name").val(),
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                success: function (res) {
                    res = JSON.parse(res);
                    if (res === true) {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: '成功加入會員',
                            showConfirmButton: false,
                            timer: 1000
                        })
                            .then(function () {
                                window.location.href = "../templates/login.html"
                            });
                    } else {
                        Swal.fire({
                            position: 'top',
                            icon: 'error',
                            title: '該Email已被註冊',
                        })
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        } else {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '資料輸入格式錯誤',
            })
        }
    });
})
