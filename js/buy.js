
$(document).ready(function () {

    let nameRule = /^.+$/;
    let cardRule = /^\d{4}$/;
    let monthRule = /^[0-1][0-9]$/;
    let yearRule = /^[2-9][0-9]$/;
    let safeRule = /^\d{3}$/;
    
    /**
     * 檢查名字是否空白
     */
    $("#firstName").blur(function () {
        if (nameRule.test($("#firstName").val())) {
            $(".first").text("");
            // $("#lastName").css("border-color", "#265f94");
            $("#firstName").css("border-color", "#265f94");
            nameCheck2 = true;
        } else {
            $(".first").text("請輸入姓名");
            $(".first").css({
                color: "red",
                "font-size": "0.8rem"
            });
            // $("#lastName").css("border-color", "red");
            $("#firstName").css("border-color", "red");
            nameCheck2 = false;
        }
    });
    
    $("#lastName").blur(function () {
        if (nameRule.test($("#lastName").val())) {
            $(".last").text("");
            $("#lastName").css("border-color", "#265f94");
            // $("#firstName").css("border-color", "#265f94");
            nameCheck1 = true;
        } else {
            $(".last").text("請輸入姓名");
            $(".last").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#lastName").css("border-color", "red");
            // $("#firstName").css("border-color", "red");
            nameCheck1 = false;
        }
    });

    /**
     * 檢查卡號
     */
    $("#cardNum1").blur(function () {
        if (cardRule.test($("#cardNum1").val())) {
            $(".card1").text("");
            $("#cardNum1").css("border-color", "#265f94");
            cardCheck1 = true;
        } else {
            $(".card1").text("請輸入卡號");
            $(".card1").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardNum1").css("border-color", "red");
            $(".card1").css("border-color", "red");
            cardCeck1 = false;
        }
    });
    $("#cardNum2").blur(function () {
        if (cardRule.test($("#cardNum2").val())) {
            $(".card2").text("");
            $("#cardNum2").css("border-color", "#265f94");
            cardCheck2 = true;
        } else {
            $(".card2").text("請輸入卡號");
            $(".card2").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardNum2").css("border-color", "red");
            $(".card2").css("border-color", "red");
            cardCheck2 = false;
        }
    });
    $("#cardNum3").blur(function () {
        if (cardRule.test($("#cardNum3").val())) {
            $(".card3").text("");
            $("#cardNum3").css("border-color", "#265f94");
            cardCheck3 = true;
        } else {
            $(".card3").text("請輸入卡號");
            $(".card3").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardNum3").css("border-color", "red");
            $(".card3").css("border-color", "red");
            cardCheck3 = false;
        }
    });
    $("#cardNum4").blur(function () {
        if (cardRule.test($("#cardNum4").val())) {
            $(".card4").text("");
            $("#cardNum4").css("border-color", "#265f94");
            cardCheck4 = true;
        } else {
            $(".card4").text("請輸入卡號");
            $(".card4").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardNum4").css("border-color", "red");
            $(".card4").css("border-color", "red");
            cardCheck4 = false;
        }
    });

    /**
     * 檢查日期
     */
    $("#cardMonth").blur(function () {
        if (monthRule.test($("#cardMonth").val())) {
            $(".month").text("");
            $("#cardMonth").css("border-color", "#265f94");
            monthCheck = true;
        } else {
            $(".month").text("請輸入月份");
            $(".month").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardMonth").css("border-color", "red");
            $(".month").css("border-color", "red");
            monthCheck = false;
        }
    });
    $("#cardYear").blur(function () {
        if (yearRule.test($("#cardYear").val())) {
            $(".year").text("");
            $("#cardYear").css("border-color", "#265f94");
            yearCheck = true;
        } else {
            $(".year").text("請輸入年分");
            $(".year").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardYear").css("border-color", "red");
            $(".year").css("border-color", "red");
            yearCheck = false;
        }
    });
    /**
     * 檢查安全碼
     */
    $("#cardSafe").blur(function () {
        if (safeRule.test($("#cardSafe").val())) {
            $(".safe").text("");
            $("#cardSafe").css("border-color", "#265f94");
            safeCheck = true;
        } else {
            $(".safe").text("請輸入安全碼");
            $(".safe").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#cardSafe").css("border-color", "red");
            $(".safe").css("border-color", "red");
            safeCheck = false;
        }
    });


    $("#submitBuy").click(function () {
        if (nameCheck2 && nameCheck1 && cardCheck1 && cardCheck2 && cardCheck3
            && cardCheck4 && monthCheck && yearCheck && safeCheck) {
            $.ajax({
                type: "POST",
                url: "../CashContro.php",
                data: {
                    todo: 'deposit',
                    moneyId: $("[name='jkoprice']:checked").val(),
                },
                success: function (res) {
                    res = JSON.parse(res);
                    if (res === true) {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: '成功購買',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = "../backend/home_index.php"
                        });
                    } else {
                        Swal.fire({
                            position: 'top',
                            icon: 'error',
                            title: '帳號密碼錯誤!',
                        })
                    }
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        } else {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '資料輸入未完全',
            })
        }

    })
})

/**
 * 確認購買內容隨radio按鈕做更換
 */
function radioChang(e) {
    // money = $("[name='jkoprice']:checked").val();
    // console.log(money);
    price = $("#price" + e).text();
    point = $("#point" + e).text();
    $("#cointable").text(point);
    $("#pricetable").text(price);
}

/**
 * 我同意勾選後送出才能按
 */
function agreeCheck() {
    // console.log($("#agree").prop("checked"));
    if ($("#agree").prop("checked")) {
        $("#submitBuy").attr("disabled", false);
    } else {
        $("#submitBuy").attr("disabled", true);
    }
}