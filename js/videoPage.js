
// $(document).ready(function () {
//     $('#myModal').hide();
// })

/**
 * 已購買
 */
function watchVideo(e) {
    $.ajax({
        type: "POST", //傳送方式
        url: "../VideoContro.php", //傳送目的地
        data: {
            todo: 'videoLink',
            id: e,
        },
        success: function (res) {
            console.log(res);
            res = JSON.parse(res);
            if (res['success'] === true) {
                $(".modal").hide();
                $('#myModal' + e).show();
                last = $("body").height() - $(window).height() //滾到最底
                $("html").animate({
                    scrollTop: last
                }, 1000);
            } else if (res['success'] === false && res['error'] === 'off') {
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: '影片已下架!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = "../backend/home_index.php"
                });
            } else {
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: '您已被停權!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
                    window.location.href = "../backend/home_index.php"
                });
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

/**
 * 未購買
 */
function buyVideo(e) {
    Swal.fire({
        title: '是否進行購買?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '是',
        cancelButtonText: '取消',
    })
        .then((result) => {
            if (result.value === true) { //sweetalert2 彈窗選確定
                $.ajax({
                    type: "POST", //傳送方式
                    url: "../CashContro.php", //傳送目的地
                    data: {
                        todo: 'buyVideo',
                        videoId: e,
                    },
                    success: function (res) {
                        console.log(res);
                        res = JSON.parse(res);
                        console.log(res);
                        if (res['success'] === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '購買完成!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                // location.reload();
                                $("#isbuy" + e).text("已購買");
                                $(".modal").hide();
                                $('#myModal' + e).show();
                                last = $("body").height() - $(window).height() //滾到最底
                                $("html").animate({
                                    scrollTop: last
                                }, 1000);
                            });
                        } else if (res['success'] === false && res['error'] === 'off') {
                            Swal.fire({
                                position: 'top',
                                icon: 'error',
                                title: '影片已下架!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                position: 'top',
                                icon: 'error',
                                title: '您已被停權!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
                                window.location.href = "../backend/home_index.php"
                            });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        })

}

/**
 * 餘額不足
 */
function noMoney() {
    Swal.fire({
        icon: 'error',
        title: '餘額不足!將為您跳轉至儲值頁!',
    }).then(function () {
        window.location.href = "../backend/buy_index.php"
    })
}
