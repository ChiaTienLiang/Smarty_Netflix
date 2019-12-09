$(document).ready(function () {
    let Rule = /^[\s\S]*.*[^\s][\s\S]*$/;
    let numCheck, nameCheck, priceCheck;
    $(".table").hide();
    $(".myModal").hide();

    let numRule = /^([1-9][0-9]*){1,2}$/;
    let priceRule = /^([1-9][0-9]*){1,3}$/;

    /**
     * 上傳的圖片顯示(新增)
     */
    $("#imgInput1").change(function () {
        readURL(this, 1);
    });

    $("#imgInput2").change(function () {
        readURL(this, 2);
    });

    /**
     * 上傳的圖片顯示(編輯)
     */
    $(".editImg1").change(function () {
        var id = $(this).attr("id");
        id = id.substr(8);
        editImgUrl(this, 1, id);
    });

    $(".editImg2").change(function () {
        var id = $(this).attr("id");
        id = id.substr(8);
        editImgUrl(this, 2, id);
    });

    /**
     * 判斷是否有輸入
     */
    $("#epNum").blur(function () {
        if (numRule.test($("#epNum").val())) {
            $(".epNum").text("");
            $("#epNum").css("border-color", "#265f94");
            numCheck = true;
        } else {
            $(".epNum").text("請輸入集數");
            $(".epNum").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epNum").css("border-color", "red");
            numCheck = false;
        }
    });
    $("#epName").blur(function () {
        if (Rule.test($("#epName").val())) {
            $(".epName").text("");
            $("#epName").css("border-color", "#265f94");
            nameCheck = true;
        } else {
            $(".epName").text("請輸入該集名稱");
            $(".epName").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epName").css("border-color", "red");
            nameCheck = false;
        }
    });
    $("#epPrice").blur(function () {
        if (priceRule.test($("#epPrice").val())) {
            $(".epPrice").text("");
            $("#epPrice").css("border-color", "#265f94");
            priceCheck = true;
        } else {
            $(".epPrice").text("請輸入該集名稱");
            $(".epPrice").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epPrice").css("border-color", "red");
            priceCheck = false;
        }
    });

    /**
     * 左側按鈕
     */
    $("#memberBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#memberData").show();
    })

    $("#videoBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#videoData").show();
    })

    $("#createBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#newVideo").show();
    })

    $("#uploadBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#uploadEp").show();
    })

    /**
     * 上傳分集影片
     */
    $("#uploadButton").click(function () {
        // console.log($("#selectVideo").val());
        //判斷是否有檔案上傳
        if (($("#videoInput").prop('files').length > 0) && numCheck && nameCheck && priceCheck) {
            //判斷影片格式
            let validExt = new Array(".mp4", ".avi", ".mpg");
            let file = $("#videoInput").prop('files')[0];
            let fileExt = file['name'].substring(file['name'].lastIndexOf('.'));
            let epName = "第" + $("#epNum").val() + "話&emsp;" + $("#epName").val();
            // console.log(epName);
            if (validExt.indexOf(fileExt) === 0) {
                let form_data = new FormData();  //建構new FormData()
                form_data.append('file', file);
                form_data.append('todo', "uploadEp");
                form_data.append('epName', epName);
                form_data.append('videoId', $("#selectVideo").val());
                form_data.append('price', $("#epPrice").val());
                $.ajax({
                    type: "POST", //傳送方式
                    url: "../VideoContro.php", //傳送目的地
                    data: form_data,
                    cache: false,
                    contentType: false, // 告訴jQuery不要去設定Content-Type請求頭
                    processData: false, // 告訴jQuery不要去處理髮送的資料
                    success: function (res) {
                        console.log(res);
                        res = JSON.parse(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '上傳成功!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#epNum").val("");
                                $("#epName").val("");
                                $("#selectVideo").val("");
                                $("#epPrice").val("");
                                $("#videoInput").val("");
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
            } else {
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: '影片格式錯誤!',
                })
            }
            // console.log(fileExt);
        } else {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '未上傳影片!',
            })
        }


    });

    /**
     * 編輯影片資訊
     */
    $(".onshelf").click(function () {
        var id = $(this).attr("id");
        $("#myModal" + id).show();
        $("#editModal" + id).show();
        // let editName = $("#editName").val();
        // let editDescript = $("#editDescript").val();
        // let showEditImg1 = $("#showEditImg1").attr('src');
        // let showEditImg2 = $("#showEditImg2").attr('src');
        // console.log(id);
    })

    /**
     * 編輯送出
     */
    $(".editSubmit").click(function () {
        var id = $(this).attr("id");
        id = id.substr(10);
        img1 = $("#showEditImg1" + id).attr('src');
        img2 = $("#showEditImg2" + id).attr('src');
        // var ImgExt = new Array(".jpg", ".jpeg", ".gif", ".png");
        if (($("#editName" + id).val() != "") && ($("#editDescript" + id).val() != "")
            && (img1 != "../images/icon.png") && (img2 != "../images/icon.png")) {
            $.ajax({
                type: "POST",
                url: "../VideoContro.php",
                data: {
                    todo: 'editVideo',
                    id: id,
                    name: $("#editName" + id).val(),
                    des: $("#editDescript" + id).val(),
                    img1: $("#showEditImg1" + id).attr('src'),
                    img2: $("#showEditImg2" + id).attr('src'),
                },
                success: function (res) {
                    res = JSON.parse(res);
                    if (res === true) {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: '修改成功',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            // location.reload();
                            $(".myModal").hide();
                            // $("#videoData").show();
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
                    // console.log(error);
                }
            });
        } else {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '資料未輸入完全!',
            })
        }

    })

    /**
     * 取消編輯
     */
    $(".editCancel").click(function () {
        $(".myModal").hide();
        // var id = $(this).attr("id");
        // $("#myModal" + id).hide();
        // $("#editModal" + id).hide();
    })

})

    /**
     * loading
     */
    ; (function () {
        function id(v) { return document.getElementById(v); }
        function loadbar() {
            var ovrl = id("overlay"),
                prog = id("progress"),
                stat = id("progstat"),
                img = document.images,
                c = 0,
                tot = img.length;
            if (tot == 0) return doneLoading();

            function imgLoaded() {
                c += 1;
                var perc = ((100 / tot * c) << 0) + "%";
                prog.style.width = perc;
                stat.innerHTML = "Loading " + perc;
                if (c === tot) return doneLoading();
            }
            function doneLoading() {
                ovrl.style.opacity = 0;
                setTimeout(function () {
                    ovrl.style.display = "none";
                }, 1200);
            }
            for (var i = 0; i < tot; i++) {
                var tImg = new Image();
                tImg.onload = imgLoaded;
                tImg.onerror = imgLoaded;
                tImg.src = img[i].src;
            }
        }
        document.addEventListener('DOMContentLoaded', loadbar, false);
    }());

/**
 * 圖片顯示
 */
function editImgUrl(input, num, id) {
    console.log(id);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if (num === 1) {
                $("#showEditImg1" + id).attr('src', e.target.result);
            }
            else {
                $("#showEditImg2" + id).attr('src', e.target.result);
            }
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        if (num === 1)
            $("#showEditImg1" + id).attr('src', "../images/icon.png");
        else
            $("#showEditImg2" + id).attr('src', "../images/icon.png");
    }
}


function readURL(input, num) {
    console.log(input.files);
    console.log(input.files[0]);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if (num === 1) {
                $("#showImg1").attr('src', e.target.result);
            }
            else {
                $("#showImg2").attr('src', e.target.result);
            }
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        if (num === 1)
            $("#showImg1").attr('src', "../images/icon.png");
        else
            $("#showImg2").attr('src', "../images/icon.png");
    }
}

/**
 * 會員停權
 */
function stop(e) {
    Swal.fire({
        title: '是否停權該會員?',
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
                    url: "../MemberContro.php", //傳送目的地
                    data: {
                        todo: 'stopPms',
                        memberId: e,
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        console.log(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '該會員已被停權!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#permission" + e).removeClass("btn-danger");
                                $("#permission" + e).addClass("btn-success");
                                $("#permission" + e).text("恢復");
                                $("#permission" + e).removeAttr("onclick", 'stop(' + e + ')');
                                $("#permission" + e).attr("onclick", 'restore(' + e + ')');
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
 * 停權恢復 
 */
function restore(e) {
    Swal.fire({
        title: '是否恢復該會員權限?',
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
                    url: "../MemberContro.php", //傳送目的地
                    data: {
                        todo: 'restore',
                        memberId: e,
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        console.log(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '該會員已恢復權限!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#permission" + e).removeClass("btn-success");
                                $("#permission" + e).addClass("btn-danger");
                                $("#permission" + e).text("停權");
                                $("#permission" + e).removeAttr("onclick", 'restore(' + e + ')');
                                $("#permission" + e).attr("onclick", 'stop(' + e + ')');

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
 * 影片上架 
 */
function up(e) {
    Swal.fire({
        title: '是否上架影片?',
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
                    url: "../VideoContro.php", //傳送目的地
                    data: {
                        todo: 'onShelf',
                        videoId: e,
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        // console.log(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '影片上架成功!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#shelf" + e).removeClass("btn-success");
                                $("#shelf" + e).addClass("btn-danger");
                                $("#shelf" + e).text("下架");
                                $("#shelf" + e).removeAttr("onclick", 'up(' + e + ')');
                                $("#shelf" + e).attr("onclick", 'down(' + e + ')');
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
 * 影片下架 
 */
function down(e) {
    Swal.fire({
        title: '是否下架該影片?',
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
                    url: "../VideoContro.php", //傳送目的地
                    data: {
                        todo: 'offShelf',
                        videoId: e,
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        // console.log(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '該影片已下架!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#shelf" + e).removeClass("btn-danger");
                                $("#shelf" + e).addClass("btn-success");
                                $("#shelf" + e).text("上架");
                                $("#shelf" + e).removeAttr("onclick", 'down(' + e + ')');
                                $("#shelf" + e).attr("onclick", 'up(' + e + ')');
                                // window.location.href = "../backend/home_index.php"
                                // location.reload();
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
 * 新建影集資訊
 */
function newVideo() {
    img1 = $("#showImg1").attr('src');
    img2 = $("#showImg2").attr('src');
    // var ImgExt = new Array(".jpg", ".jpeg", ".gif", ".png");
    if (nameCheck && desCheck && (img1 != "../images/icon.png")
        && (img2 != "../images/icon.png")) {
        $.ajax({
            type: "POST",
            url: "../VideoContro.php",
            data: {
                todo: 'newVideo',
                name: $("#videoName").val(),
                des: $("#descriptV").val(),
                img1: $("#showImg1").attr('src'),
                img2: $("#showImg2").attr('src'),
            },
            success: function (res) {
                console.log(res);
                res = JSON.parse(res);
                if (res === true) {
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: '建立成功',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        location.reload();
                        $(".table").hide();
                        // $("#videoData").show();
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
                // console.log(error);
            }
        });
    } else {
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: '資料未輸入完全!',
        })
    }
}

