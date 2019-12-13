$(document).ready(function () {
    /**
    * 登出
    */
    $(".logout").click(function () {
        $.ajax({
            type: "POST", //傳送方式
            url: "../MemberContro.php", //傳送目的地
            data: {
                todo: 'logout',
            },
            success: function (res) {
                res = JSON.parse(res);
                if (res['success'] === true) {
                    let timerInterval
                    Swal.fire({
                        title: '頁面將於3秒後進行跳轉',
                        html: '<b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                Swal.getContent().querySelector('b')
                                    .textContent = parseInt(Math
                                        .ceil(Swal.getTimerLeft() /
                                            1000))
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                            sessionStorage.removeItem('key');
                            window.location.href = "../backend/home_index.php"
                        }
                    }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            sessionStorage.removeItem('key');
                            window.location.href = "../backend/home_index.php"
                        }
                    })
                } else {
                    Swal.fire({
                        // position: 'top',
                        icon: 'error',
                        title: '發生無預期的錯誤!',
                    }).then((result) => {
                        window.location.href = "../backend/home_index.php"
                    })
                }
            },
            error: function (error) {
                // console.log(error);
            }
        });
    });
})
