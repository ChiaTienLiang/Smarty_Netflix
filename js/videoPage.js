
// $(document).ready(function () {
//     $('#myModal').hide();
// })

/**
 * 已購買
 */
function watchVideo(e) {
    $(".modal").hide();

    $('#myModal' + e).show();
    last = $("body").height() - $(window).height() //滾到最底
    $("html").animate({
        scrollTop: last
    }, 1000);

}

/**
 * 未購買
 */
function buyVideo(e) {
    console.log(e);
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
                        res = JSON.parse(res);
                        console.log(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '購買完成!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                // window.location.href = "../backend/home_index.php"
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                position: 'top',
                                icon: 'error',
                                title: '失敗!',
                            })
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
