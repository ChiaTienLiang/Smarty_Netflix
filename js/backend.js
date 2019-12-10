$(document).ready(function () {
    let Rule = /^[\s\S]*.*[^\s][\s\S]*$/;
    let nameCheck, desCheck, epNumCheck, epNameCheck, epPriceCheck;
    $(".table").hide();
    $(".myModal").hide();
    $("#selectDiv").hide();
    $(".editEpTable").hide();
    $(".epModal").hide();

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
     * 判斷是否有輸入(分集)
     */
    $("#epNum").blur(function () {
        if (numRule.test($("#epNum").val())) {
            $(".epNum").text("");
            $("#epNum").css("border-color", "#265f94");
            epNumCheck = true;
        } else {
            $(".epNum").text("請輸入集數");
            $(".epNum").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epNum").css("border-color", "red");
            epnumCheck = false;
        }
    });
    $("#epName").blur(function () {
        if (Rule.test($("#epName").val())) {
            $(".epName").text("");
            $("#epName").css("border-color", "#265f94");
            epNameCheck = true;
        } else {
            $(".epName").text("請輸入該集名稱");
            $(".epName").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epName").css("border-color", "red");
            epNameCheck = false;
        }
    });
    $("#epPrice").blur(function () {
        if (priceRule.test($("#epPrice").val())) {
            $(".epPrice").text("");
            $("#epPrice").css("border-color", "#265f94");
            epPriceCheck = true;
        } else {
            $(".epPrice").text("請輸入該集名稱");
            $(".epPrice").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#epPrice").css("border-color", "red");
            epPriceCheck = false;
        }
    });

    /**
    * 判斷是否有輸入(影集)
    */
    $("#videoName").blur(function () {
        if (Rule.test($("#videoName").val())) {
            $(".videoName").text("");
            $("#videoName").css("border-color", "#265f94");
            nameCheck = true;
        } else {
            $(".videoName").text("請輸入影片名稱");
            $(".videoName").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#videoName").css("border-color", "red");
            nameCheck = false;
        }
    });
    $("#descriptV").blur(function () {
        if (Rule.test($("#descriptV").val())) {
            $(".descript").text("");
            $("#descriptV").css("border-color", "#265f94");
            desCheck = true;
        } else {
            $(".descript").text("請輸入詳細敘述");
            $(".descript").css({
                color: "red",
                "font-size": "0.8rem"
            });
            $("#descriptV").css("border-color", "red");
            desCheck = false;
        }
    });

    /**
     * 左側按鈕
     */
    $("#memberBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#memberData").show();
        $("#selectDiv").hide();
    })

    $("#videoBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#videoData").show();
        $("#selectDiv").hide();
    })

    $("#createBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#selectDiv").hide();
        $("#newVideo").show();
    })

    $("#uploadBtn").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $("#selectDiv").hide();
        $("#uploadEp").show();
    })

    $("#editEp").click(function () {
        $(".table").hide();
        $("#modalDiv").hide();
        $(".epTable").show();
        $("#selectDiv").show();
        $(".epBodytest").hide();
        let select = $("#selectEp").val();
        $(".epBody" + select).show();
    })

    /**
     * 上傳分集影片
     */
    $("#uploadButton").click(function () {
        // console.log($("#selectVideo").val());
        //判斷是否有檔案上傳
        if (($("#videoInput").prop('files').length > 0) && epNumCheck && epNameCheck && epPriceCheck) {
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
                            $("#newVname" + id).text($("#editName" + id).val());
                            $("#newVdes" + id).text($("#editDescript" + id).val());
                            $(".myModal").hide();;
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
     * 取消編輯-影集
     */
    $(".editCancel").click(function () {
        $(".myModal").hide();
    })

    /**
     * 影片的下拉選單
     */
    $(".epList").change(function () {
        let select = $("#selectEp").val();
        $(".epBodytest").hide();
        $(".epBody" + select).show();
        // document.location.hash = 'id=' + a;
        // var uri = $("#option" + a).attr('href');
        // console.log(uri);
    })

    /**
    * 新建影集資訊
    */
    $("#newVideoBtn").click(function () {
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
    })

    /**
     * 分集編輯修改
     */
    $(".epEdit").click(function () {
        var id = $(this).attr("id");
        $("#epModal" + id).show();
        $("#editEpTable" + id).show();
    })

    /**
     * 取消編輯-分集
     */
    $(".editEpCancel").click(function () {
        $(".editEpTable").hide();
        $(".epModal").hide();
    })

    /**
     * 送出編輯-分集
     */
    $(".editEpSubmit").click(function () {
        var id = $(this).attr("id");
        id = id.substr(12);
        if (numRule.test($("#epNum" + id).val()) && Rule.test($("#epName" + id).val()) &&
            priceRule.test($("#epPrice" + id).val())) {
            let epName = "第" + $("#epNum" + id).val() + "話&emsp;" + $("#epName" + id).val();
            // 如果有影片
            if (($("#videoEdit" + id).prop('files').length > 0)) {
                //判斷影片格式
                let validExt = new Array(".mp4", ".avi", ".mpg");
                let file = $("#videoEdit" + id).prop('files')[0];
                let fileExt = file['name'].substring(file['name'].lastIndexOf('.'));
                // console.log(epName);
                if (validExt.indexOf(fileExt) === 0) {
                    let form_data = new FormData();  //建構new FormData()
                    form_data.append('file', file);
                    form_data.append('todo', "editEp");
                    form_data.append('epName', epName);
                    form_data.append('id', id);
                    form_data.append('price', $("#epPrice" + id).val());
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
                                    $("#newNo" + id).text($("#epNum" + id).val());
                                    $("#newName" + id).text($("#epName" + id).val());
                                    $("#newPrice" + id).text($("#epPrice" + id).val());
                                    $(".editEpTable").hide();
                                    $(".epModal").hide();
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
            } else {
                $.ajax({
                    type: "POST", //傳送方式
                    url: "../VideoContro.php", //傳送目的地
                    data: {
                        todo: 'editEp_nofile',
                        epName: epName,
                        id: id,
                        price: $("#epPrice" + id).val()
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        if (res === true) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: '修改成功!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#newNo" + id).text($("#epNum" + id).val());
                                $("#newName" + id).text($("#epName" + id).val());
                                $("#newPrice" + id).text($("#epPrice" + id).val());
                                $(".editEpTable").hide();
                                $(".epModal").hide();
                            });
                        } else {
                            Swal.fire({
                                position: 'top',
                                icon: 'error',
                                title: '修改失敗!',
                            })
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        }
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
                                $("#memStop" + e).text("停權中");
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
                                $("#memRestore" + e).text("正常使用中");
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
