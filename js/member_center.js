$(document).ready(function () {
    $(".table").hide();
    $(".modal").hide();

    $("#memberBtn").click(function () {
        $(".table").hide();
        $(".modal").hide();
        $("#memberData").show();
    })

    $("#videoBtn").click(function () {
        $(".table").hide();
        $(".modal").hide();
        $("#videoData").show();
    })

    $(".onshelf").click(function () {
        var id = $(this).attr("id");
        $.ajax({
            type: "POST", //傳送方式
            url: "../VideoContro.php", //傳送目的地
            data: {
                todo: 'videoLink',
                id: id,
            },
            success: function (res) {
                // console.log(res);
                res = JSON.parse(res);
                if (res['success'] === true) {
                    $(".modal").hide();
                    $('#Modal' + id).show();
                    last = $("body").height() - $(window).height() //滾到最底
                    $("html").animate({
                        scrollTop: last
                    }, 1000);
                } else if (res['success'] === false && res['error_code'] === 1) {
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
    })

})
