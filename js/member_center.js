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
        $(".modal").hide();
        $('#Modal' + id).show();
        last = $("body").height() - $(window).height() //滾到最底
        $("html").animate({
            scrollTop: last
        }, 1000);
    })

})
