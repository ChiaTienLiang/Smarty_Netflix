$(document).ready(function () {
    $(".table").hide();

    $("#memberBtn").click(function () {
        $(".table").hide();
        $("#memberData").show();
    })

    $("#videoBtn").click(function () {
        $(".table").hide();
        $("#videoData").show();
    })

})
